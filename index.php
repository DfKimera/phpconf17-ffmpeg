<?php


    require 'vendor/autoload.php';

    use Symfony\Component\Process\Process;
    use Symfony\Component\Process\ProcessBuilder;

    $builder = new ProcessBuilder();
    $builder->setPrefix('ffmpeg');

    $process = $builder
        ->setArguments([
            '-i', 'doctor_strange.mp4',
            '-i', 'keyboard_cat.mp4',
            '-filter_complex',
            '[1] chromakey=color=green:similarity=0.1 [chroma]; [0][chroma] overlay',
            'output5.mp4'
        ])
        ->getProcess();

    $process->run(function ($type, $buffer) {
        echo $buffer;
    });



