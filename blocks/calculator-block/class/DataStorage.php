<?php

namespace KolektywKreatywny\CalculatorBlock;

use Exception;

class DataStorage
{
    protected string $file;
    protected string $delimiter = ";";

    public function store(): self
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $rawData = file_get_contents('php://input');
            $data = json_decode($rawData, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                $this->appendData($data);
            }
        }

        return $this;
    }

    public function getData(): string
    {
        $file = $this->getFile();
        $fileContent = file_get_contents($file);
        $dataString = str_replace(PHP_EOL, '<br>', $fileContent);

        return $dataString;
    }

    protected function appendData(array $rawData): self
    {
        foreach ($rawData as $element) {
            $dataArray[] = htmlspecialchars($element);
        }

        $file = $this->getFile();
        $delimiter = $this->getDelimiter();
        $fileContents = file_get_contents($file);
        $dataString = implode($delimiter, $dataArray);
        $data = sprintf('%s%s%s', $dataString, PHP_EOL, $fileContents);

        file_put_contents($file, $data);

        return $this;
    }

    public function setFile(string $file): self
    {
        $fileSrc = sprintf('%s/../assets/%s', __DIR__, $file);
        $fileExist = file_exists($fileSrc);

        if (!$fileExist) {
            throw new Exception('File not found');
        }

        $this->file = $fileSrc;

        return $this;
    }

    protected function getFile(): string
    {
        return $this->file;
    }

    protected function getDelimiter(): string
    {
        return $this->delimiter;
    }
}