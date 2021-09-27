<?php

namespace App;

use League\Csv\Reader;
use League\Csv\Writer;
use League\Csv\Statement;

class DataLoader
{
    public static function loadMessages(string $address): array
    {

        $csv = Reader::createFromPath($address, 'r');
        $csv->setDelimiter(',');
//        $csv->setHeaderOffset(0); //set the CSV header offset


        $records = Statement::create()->process($csv);
        $data = [];

        foreach ($records as $record) {
            $data[] = new Message($record[0], $record[1], $record[2] ?? '');
        }
        return $data;
    }

    public static function saveMessages(array $messages, string $address): void
    {
        $messagesToSave = [];
        foreach ($messages as $message) {
            $messagesToSave[] = [$message->getNickname(), $message->getMessage(), $message->getDateTime() ?? ''];
        }

        $writer = Writer::createFromPath($address, 'w+');
        $writer->insertAll($messagesToSave);
    }
}