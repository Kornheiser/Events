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

interface EventInvoker {
    
    public function call(Event $event): void;
}