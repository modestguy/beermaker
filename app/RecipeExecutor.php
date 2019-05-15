<?php
namespace App;

use App\Model\System\ProcessHandler;

/**
 * Beer recipe executor
 */
class RecipeExecutor {

    /**
     * @var ProcessHandler|null
     */
    private $processHandler = null;

    /**
     * RecipeExecutor constructor.
     * @param ProcessHandler $processHandler
     */
    public function __construct(ProcessHandler $processHandler)
    {
        $this->processHandler = $processHandler;
    }

    /**
     * Процесс затирание солода (температурные паузы)
     * @param Recipe $recipe
     */
    public function executeMashingMalt(Recipe $recipe)
    {
        $this->processHandler->stopAllElements();

        /** @var TemperaturePause $currentTemperaturePause */
        foreach ($recipe->temperaturePauses as $currentTemperaturePause)
        {
            $this->processHandler->heat($currentTemperaturePause->temperature);
            $this->processHandler->stableTemperature(
                $currentTemperaturePause->temperature,
                $currentTemperaturePause->duration
            );
        }

        $this->processHandler->stopAllElements();
    }
}
