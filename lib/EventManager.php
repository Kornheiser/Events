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

class EventManager implements EventInvoker {
    
    /** @var Handler[]*/
    protected array $handlers = [];
    
    public function call(Event $ev): void {
        foreach ($this->getHandlers() as $handler) {
            $handler->onHandle($ev);
        }
    }
    
    public function addHandler(Handler $handler): void {
        $this->handlers[] = $handler;
    }
    
    public function removeHandlers(): void {
        $this->handlers = [];
    }
    
    /** @return Handler[]*/
    public function getHandlers(): array {
        return $this->handlers;
    }
}