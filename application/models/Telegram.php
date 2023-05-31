<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Telegram extends CI_Model {

	public function send($botToken, $chatId, $message) {
		// Load the customcurl library
		$this->load->library('customcurl');

		// Set the chat ID, message, and bot token
		//Use this inside controller
		//$this->Telegram->send($botToken, $chatId, $message);
		// $chatId = $this->Site_settings->telegram_ChatId();
		// $botToken = $this->Site_settings->telegramApi();
		$message = str_replace("<br />", "\n", $message);
		$message = str_replace("<br/>", "\n", $message);
		$message = str_replace("<br>", "\n", $message);
		$message = str_replace("<p>", "", $message);
		$message = str_replace("</p>", "", $message);
		

		// Set the Telegram Bot API endpoint URL with the required parameters
		$url = "https://api.telegram.org/bot{$botToken}/sendMessage?chat_id={$chatId}&parse_mode=html&text=" . urlencode($message);

		// Make the API request using the customcurl library
		$response = $this->customcurl->simple_get($url);

		// Handle the response
		$responseData = json_decode($response, true);
	
		if ($responseData && $responseData['ok']) {
			$status = "<strong>Message sent successfully.</strong> Message ID: " . $responseData['result']['message_id'];
			$telegram_for_databse = array(
				"msg_id" => $responseData['result']['message_id'],
				"message" => $message,
				"msg_status" => $responseData['ok'],
				"image" => "0",
				"description" => '0',
				"added_user_id" => $this->session->userdata('UserId')
			);
			$this->db->insert('telegram_messages', $telegram_for_databse);
		} else {
			$status = "<strong>Failed to send the message.</strong> Error message: " . $responseData['description'];
			$telegram_for_databse = array(
				"msg_id" => '000',
				"message" => $message,
				"msg_status" => $responseData['ok'],
				"image" => "0",
				"description" => $responseData['description'],
				"added_user_id" => $this->session->userdata('UserId')
			);
			$this->db->insert('telegram_messages', $telegram_for_databse);
		}
		
		return $status;
	}
	public function sendPhoto($botToken, $chatId, $ImageUrl, $caption) {
		// Load the customcurl library
		$this->load->library('customcurl');

		// Set the chat ID, message, and bot token
		//Use this inside controller
		//$this->Telegram->send($botToken, $chatId, $message);
		// $chatId = $this->Site_settings->telegram_ChatId();
		// $botToken = $this->Site_settings->telegramApi();
		$caption = str_replace("<br />", "\n", $caption);
		$caption = str_replace("<br/>", "\n", $caption);
		$caption = str_replace("<br>", "\n", $caption);
		$caption = str_replace("<p>", "", $caption);
		$caption = str_replace("</p>", "", $caption);
		

		// Set the Telegram Bot API endpoint URL with the required parameters
		$url = "https://api.telegram.org/bot{$botToken}/sendPhoto?chat_id={$chatId}&parse_mode=html&photo={$ImageUrl}&caption=" . urlencode($caption);

		// Make the API request using the customcurl library
		$response = $this->customcurl->simple_get($url);

		// Handle the response
		$responseData = json_decode($response, true);
		
		if ($responseData && $responseData['ok']) {
			$status = "<strong>Message sent successfully.</strong> Message ID: " . $responseData['result']['message_id'];
			$telegram_for_databse = array(
				"msg_id" => $responseData['result']['message_id'],
				"message" => $caption,
				"msg_status" => $responseData['ok'],
				"image" => $ImageUrl,
				"added_user_id" => $this->session->userdata('UserId')
			);
			$this->db->insert('telegram_messages', $telegram_for_databse);
		} else {
			$status = "<strong>Failed to send the message.</strong> Error message: " . $responseData['description'];
			$telegram_for_databse = array(
				"msg_id" => '000',
				"message" => $caption,
				"msg_status" => $responseData['ok'],
				"image" => "0",
				"description" => $responseData['description'],
				"added_user_id" => $this->session->userdata('UserId')
			);
			$this->db->insert('telegram_messages', $telegram_for_databse);
		}
		
		return $status;
	}
	public function sendPoll($botToken, $chatId, $question, $optionsJson) {
		// Load the customcurl library
		$this->load->library('customcurl');
		// Set the Telegram Bot API endpoint URL with the required parameters
		$url = "https://api.telegram.org/bot{$botToken}/sendPoll?chat_id={$chatId}&parse_mode=html&question={$question}&options={$optionsJson}";
		// Make the API request using the customcurl library
		$response = $this->customcurl->simple_get($url);

		// Handle the response
		$responseData = json_decode($response, true);
		
		if ($responseData && $responseData['ok']) {
			$status = "<strong>Message sent successfully.</strong> Message ID: " . $responseData['result']['message_id'];
			$telegram_for_databse = array(
				"media" => "Telegram",
				"question" => $question,
				"options" => $optionsJson,
				"sent_by" => $this->session->userdata('UserId')
			);
			$this->db->insert('polls', $telegram_for_databse);
		} else {
			$status = "<strong>Failed to send the message.</strong> Error message: " . $responseData['description'];
		}
		
		return $status;
	}
	public function historyTotalRows() {
        return $this->db->count_all('telegram_messages'); // Assuming 'messages' is the name of your table
    }

    public function historygetMessages($limit, $offset) {
        $this->db->select('*');
        $this->db->from('telegram_messages');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }
}
