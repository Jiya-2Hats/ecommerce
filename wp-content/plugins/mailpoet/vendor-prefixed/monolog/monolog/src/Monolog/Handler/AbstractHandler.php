<?php
namespace MailPoetVendor\Monolog\Handler;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Monolog\Formatter\FormatterInterface;
use MailPoetVendor\Monolog\Formatter\LineFormatter;
use MailPoetVendor\Monolog\Logger;
use MailPoetVendor\Monolog\ResettableInterface;
abstract class AbstractHandler implements HandlerInterface, ResettableInterface
{
 protected $level = Logger::DEBUG;
 protected $bubble = \true;
 protected $formatter;
 protected $processors = array();
 public function __construct($level = Logger::DEBUG, $bubble = \true)
 {
 $this->setLevel($level);
 $this->bubble = $bubble;
 }
 public function isHandling(array $record)
 {
 return $record['level'] >= $this->level;
 }
 public function handleBatch(array $records)
 {
 foreach ($records as $record) {
 $this->handle($record);
 }
 }
 public function close()
 {
 }
 public function pushProcessor($callback)
 {
 if (!\is_callable($callback)) {
 throw new \InvalidArgumentException('Processors must be valid callables (callback or object with an __invoke method), ' . \var_export($callback, \true) . ' given');
 }
 \array_unshift($this->processors, $callback);
 return $this;
 }
 public function popProcessor()
 {
 if (!$this->processors) {
 throw new \LogicException('You tried to pop from an empty processor stack.');
 }
 return \array_shift($this->processors);
 }
 public function setFormatter(FormatterInterface $formatter)
 {
 $this->formatter = $formatter;
 return $this;
 }
 public function getFormatter()
 {
 if (!$this->formatter) {
 $this->formatter = $this->getDefaultFormatter();
 }
 return $this->formatter;
 }
 public function setLevel($level)
 {
 $this->level = Logger::toMonologLevel($level);
 return $this;
 }
 public function getLevel()
 {
 return $this->level;
 }
 public function setBubble($bubble)
 {
 $this->bubble = $bubble;
 return $this;
 }
 public function getBubble()
 {
 return $this->bubble;
 }
 public function __destruct()
 {
 try {
 $this->close();
 } catch (\Exception $e) {
 // do nothing
 } catch (\Throwable $e) {
 // do nothing
 }
 }
 public function reset()
 {
 foreach ($this->processors as $processor) {
 if ($processor instanceof ResettableInterface) {
 $processor->reset();
 }
 }
 }
 protected function getDefaultFormatter()
 {
 return new LineFormatter();
 }
}
