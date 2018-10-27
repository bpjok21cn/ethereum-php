<?php

namespace EthereumPHP\Types;

class TransactionReceipt
{
    private $blockHash;
    private $blockNumber;
    private $contractAddress;
    private $cumulativeGasUsed;
    private $from;
    private $gasUsed;
    private $logs;
    private $logsBloom;
    private $status;
    private $to;
    private $transactionHash;
    private $transactionIndex;
    
    public function __construct(array $response)
    {
        $this->blockHash = new BlockHash($response['blockHash']);
        $this->blockNumber = hexdec($response['blockNumber']);
        if ($response['contractAddress']) {
            $this->contractAddress = new Address($response['contractAddress']);
        }
        $this->cumulativeGasUsed = hexdec($response['cumulativeGasUsed']);
        $this->from = new Address($response['from']);
        $this->gasUsed = hexdec($response['gasUsed']);
        $this->logs = $response['logs'];
        $this->logsBloom = hexdec($response['logsBloom']);
        $this->status = hexdec($response['status']);
        if ($response['to']) {
            $this->to = new Address($response['to']);
        }
        $this->transactionHash = new TransactionHash($response['transactionHash']);
        $this->transactionIndex = hexdec($response['transactionIndex']);
    }

    public function status(): int
    {
        return $this->status;
    }

}
