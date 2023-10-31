<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

final readonly class OtherBrowserSessionsService
{
    public function isUsingDatabaseDriver(): bool
    {
        return config('session.driver') === 'database';
    }

    public function getSessionEntities(): Collection
    {
        if (! $this->isUsingDatabaseDriver()) {
            return collect();
        }

        return collect($this->selectSessionsFromDatabase())->map(function ($session) {
            return (object) [
                'agent' => $this->createAgent($session),
                'ip_address' => $session->ip_address,
                'is_current_device' => $session->id === request()->session()->getId(),
                'last_active' => Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
            ];
        });
    }

    public function deleteOtherSessionRecords(): void
    {
        if (! $this->isUsingDatabaseDriver()) {
            return;
        }

        DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))
            ->where('user_id', Auth::user()->getAuthIdentifier())
            ->where('id', '!=', request()->session()->getId())
            ->delete();
    }

    protected function selectSessionsFromDatabase(): Collection
    {
        return DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))
            ->where('user_id', Auth::user()->getAuthIdentifier())
            ->orderBy('last_activity', 'desc')
            ->get();
    }

    protected function createAgent($session)
    {
        return tap(new Agent, function ($agent) use ($session) {
            $agent->setUserAgent($session->user_agent);
        });
    }
}
