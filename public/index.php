<?php

use Grabo\Grabber\Grabber;
use Grabo\Grabber\GrabberSources\SautoGrabberSource;
use Grabo\Queue\Queue;
use Grabo\Queue\QueueProcessor;
use Grabo\Queue\SimpleListener;

require __DIR__ . '/../vendor/autoload.php';

# Data sources
$grabberSources = [new SautoGrabberSource()];

# Queue
$queue = new Queue();
$listeners = [];
$queueProcessor = new QueueProcessor($queue, $listeners);
$queueProcessor->listenTo(QueueProcessor::EVENT_NEW_AD, new SimpleListener());

# Grabber
$config = ['maxLinks' => 3];
$grabber = new Grabber($grabberSources, $config, $queue);

# RUN
$grabber->grab(); // grab data
$queueProcessor->processQueue(); // process grabbed data

