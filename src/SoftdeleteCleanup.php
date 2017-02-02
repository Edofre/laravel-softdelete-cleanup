<?php

namespace Edofre\SoftdeleteCleanup;

/**
 * Class SoftdeleteCleanup
 * @package Edofre\SoftdeleteCleanup
 */
class SoftdeleteCleanup extends \Illuminate\Console\Command
{
    /** @var string */
    protected $signature = 'db:softdelete-cleanup {model_name : The name of the model you want to delete}';
    /** @var string */
    protected $description = 'Permanently delete all the entries for the specified model name that have been deleted';
    /** @var int The deleted item count */
    private $item_count = 0;

    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        // Get the playlist from the CLI arguments
        $class_name = $this->argument('model_name');

        // Check if the class actually exists
        if (class_exists($class_name)) {
            // Delete all the model
            $this->deleteModels($class_name);
        } else {
            $this->error("Class not found in system");
            return false;
        }

        // Notify the CLI that we're done
        $this->info("$this->item_count items deleted");
    }

    /**
     * Delete all the softdeleted models for the specified model
     * @param $model
     */
    private function deleteModels($model)
    {
        $models = $model::withTrashed()
            ->whereNotNull('deleted_at')
            ->get();
        // What's the item count?
        $this->item_count = count($models);

        // Actually loop the items and delete them all
        foreach ($models as $model_item) {
            $model_item->forceDelete();
        }
    }
}