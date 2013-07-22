<?php
interface messageInterface
{
	public function __construct($id = FALSE);
	public function setMessageId($id);
	public function getMessageId();
	public function setSender($sender);
	public function getSender();
	public function setRecipient($recipient);
	public function getRecipient();
	public function setContent($content);
	public function getContent();
	public function setHeadline($headline);
	public function getHeadline();
	public function setSubtitle($subtitle);
	public function getSubtitle();
	public function setMessageText($messageText);
	public function getMessageText();
	public function findContent($id);
}
?>
