<?php

namespace app;

use alkemann\h2l\{ Request, Response, util\Http };
use alkemann\h2l\response\{ Json, Page, Html };

class ContactController
{

	public static function index(Request $req): Response {
		$contacts = ContactManager::list();
		return new Page(compact('contacts'), ['template' => 'contact/list']);
	}

	public static function view(Request $req): Response {
		$id = $req->param('id');
		$person = ContactManager::get($id);
		return new Page(compact('id', 'person'), ['template' => 'contact/view']);
	}

	public static function form(Request $req): Response {
		$id = $req->param('id');
		$person = ContactManager::get($id);
		return new Page(compact('id', 'person'), ['template' => 'contact/form']);
	}

	public static function update(Request $req): Response {
		$id = $req->param('id');
		$person = ContactManager::update($id, $req->getPostData());
		return new Page(compact('id', 'person'), ['template' => 'contact/view']);
	}

}
