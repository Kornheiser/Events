<?php

/**
 *  _  __                _          _               
 * | |/ /___  _ __ _ __ | |__   ___(_)___  ___ _ __ 
 * | ' // _ \| '__| '_ \| '_ \ / _ \ / __|/ _ \ '__|
 * | . \ (_) | |  | | | | | | |  __/ \__ \  __/ |   
 * |_|\_\___/|_|  |_| |_|_| |_|\___|_|___/\___|_|
 * 
 * Author homepage {@link https://github.com/Rollylni}
 * Kornheiser Homepage {@link https://github.com/Kornheiser}
 * 
 * @author Faruch N. <rollyllni@gmail.com>
 * @author Kornheiser Org. <kornheiser.php@gmail.com>
 * @copyright Kornheiser Org. 2021
 * @license MIT
 */
namespace Kornheiser\Event;

class TargetedHandler implements Handler {
    
    public function __construct(
        private string $targetEventClass,
        private Handler $handler
    ): void {}
    
    public function onHandle(Event $ev): void {
        if ($ev::class === $this->getTarget()) {
            $this->handler->onHandle($ev);
        }
    }
    
    public function getTarget(): string {
        return $this->targetEventClass;
    }
}