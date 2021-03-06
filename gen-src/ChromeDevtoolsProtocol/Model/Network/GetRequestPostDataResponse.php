<?php
namespace ChromeDevtoolsProtocol\Model\Network;

/**
 * Response to Network.getRequestPostData command.
 *
 * @generated This file has been auto-generated, do not edit.
 *
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 */
final class GetRequestPostDataResponse implements \JsonSerializable
{
	/**
	 * Base64-encoded request body.
	 *
	 * @var string
	 */
	public $postData;


	public static function fromJson($data)
	{
		$instance = new static();
		if (isset($data->postData)) {
			$instance->postData = (string)$data->postData;
		}
		return $instance;
	}


	public function jsonSerialize()
	{
		$data = new \stdClass();
		if ($this->postData !== null) {
			$data->postData = $this->postData;
		}
		return $data;
	}
}
