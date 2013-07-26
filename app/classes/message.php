<?php
require_once ROOT . 'app/interfaces/messageInterface.php';

class Message extends Db_Mysql implements messageInterface
{

	// Properties
	private $messageId;
	private $headline;
	private $subtitle;
	private $messageText;
	private $content;
	private $sender;
	private $recipient;

	/**
	 * Konstruktor
	 */
	public function __construct($id = FALSE) {

		$this->setMessageId($id);
		
		if ($this->getMessageId() > 0)
			$this->findMessageData();
	}

	// GETTER und SETTER
	// MESSAGE ID
	public function setMessageId($id) {
		$this->messageId = $id;
	}

	public function getMessageId() {
		return $this->messageId;
	}

	// SENDER
	public function setSender($sender) {
		$this->sender = $sender;
	}

	public function getSender() {
		return $this->sender;
	}


	// RECIPIENT
	public function setRecipient($recipient) {
		$this->recipient = $recipient;
	}

	public function getRecipient() {
		return $this->recipient;
	}

	// CONTENT
	public function setContent($content) {
		$this->content = $content;
	}

	public function getContent() {
		return $this->content;
	}

	// HEADLINE
	public function setHeadline($headline) {
		$this->headline = $headline;
	}

	public function getHeadline() {
		return $this->headline;
	}

	// SUBTITLE
	public function setSubtitle($subtitle) {
		$this->subtitle = $subtitle;
	}

	public function getSubtitle() {
		return $this->subtitle;
	}

	// MESSAGE
	public function setMessageText($messageText) {
		$this->messageText = $messageText;
	}

	public function getMessageText() {
		return $this->messageText;
	}

	// MESSAGE DATA
	public function findContent($id) {
		
		$query = "
			SELECT
				*
			FROM
				messages
			WHERE
				message_id = " . $id . "
			;";
		
		try {
			$this->query($query);
		
			$row = $this->fetchRow();

			$this->setMessageId($row['message_id']);
			$this->setContent($row['content']);
			$this->setSender($row['sender_id']);
			$this->setRecipient($row['recipient_id']);

			return $this->getContent();
		}
		catch (Db_Exception $e) {
				if($GLOBALS['debug'])
					$e->showDebug();
				else
					$e->show();
		}
	}

}
?>
