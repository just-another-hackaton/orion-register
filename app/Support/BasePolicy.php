<?php

declare(strict_types=1);

namespace App\Support;

class BasePolicy
{
    /**
     * For listing all the database entities.
     */
    const ViewAny = 'viewAny';

    /**
     * For displaying a specific database entity?
     */
    const View = 'view';

    /**
     * For creating an storing database entity.
     */
    const Create = 'create';

    /**
     * For displaying the edit view from the database entity & updating the database entity
     */
    const Update = 'update';

    /**
     * For deleting the database entity.
     * Note that it will soft delete the entity when the SoftDeletes trait is present in the entity class.
     * If u need to 'hard delete' the entity use the forceDelete policy method.
     */
    const Delete = 'delete';

    /**
     * For had deleting database entities.
     */
    const ForceDelete = 'forceDelete';

    /**
     * For restoring soft deleted database entities.
     */
    const Restore = 'restore';
}
