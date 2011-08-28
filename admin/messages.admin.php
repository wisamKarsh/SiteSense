<?php

function admin_buildContent($data,$db) {
	if (empty($data->action[2])) {
		$data->action[2]='list';
	}
	$target='admin/messages.include.'.$data->action[2].'.php';
	if (file_exists($target)) {
		common_include($target);
		$data->output['function']=$data->action[2];
	}
	if (function_exists('admin_messagesBuild')) admin_messagesBuild($data,$db);
	$data->output['pageTitle']='Messages';
}

function admin_content($data) {
	if (isset($data->output['abort']) && $data->output['abort'] === true) {
		echo $data->output['abortMessage'];
	} else {
		if (!empty($data->output['function'])) {
			admin_messagesShow($data);
		} else admin_unknown();
	}
}

?>