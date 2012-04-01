<?php
class Volante_Ajax_Controller extends Controller {

	private function return_json($data)
	{
		Session::flash('no_debug', true);
		$headers = array('Content-type' => 'application/json');
		return Response::make(json_encode($data), 200, $headers);
	}

	public function action_validate()
	{
		$status_types = array(
			'SUCCESS' => 0,
			'VALIDATION_ERRORS' => 1,
			'NO_INPUT_AND_RULES' => 2,
			'NO_INPUT' => 3,
			'NO_RULES' => 4
		);

		if( ! Input::has('input') && ! Input::has('rules'))
		{
			return $this->return_json(
				array(
					'status' => 2,
					'description' => 'Didn\'t receive any input and rules',
					'statusTypes' => $status_types
				)
			);
		}

		if( ! Input::has('input'))
		{
			return $this->return_json(
				array(
					'status' => 3,
					'description' => 'Didn\'t receive any input',
					'statusTypes' => $status_types
				)
			);
		}

		if( ! Input::has('rules'))
		{
			return $this->return_json(
				array(
					'status' => 4,
					'description' => 'Didn\'t receive any rules',
					'statusTypes' => $status_types
				)
			);
		}

		$validator = new Validator(Input::get('input'), Input::get('rules'));
		if( ! $validator->valid())
		{
			return $this->return_json(
				array(
					'status' => 1,
					'description' => 'Validation errors found',
					'result' => (array) $validator->errors,
					'statusTypes' => $status_types
				)
			);
		}

		return $this->return_json(
			array(
				'status' => 0,
				'description' => 'Valition was successfull',
				'statusTypes' => $status_types
			)
		);
	}

}