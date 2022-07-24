<?php

namespace app;

use alkemann\h2l\attributes\{ Get, Post };
use alkemann\h2l\{Request, Response };
use alkemann\h2l\response\Page;

class ContactController
{

	#[Get('/')]
	public static function index(Request $req): Response {
		$contacts = ContactManager::list();
		return new Page(compact('contacts'), ['template' => 'contact/list']);
	}

	#[Get('|/contact/(?<id>\d+)$|')]
	public static function view(Request $req): Response {
		$id = $req->param('id');
		$person = ContactManager::get($id);
		return new Page(compact('id', 'person'), ['template' => 'contact/view']);
	}

	#[Get('|/contact/(?<id>\d+)/edit$|')]
	public static function form(Request $req): Response {
		$id = $req->param('id');
		$person = ContactManager::get($id);
		return new Page(compact('id', 'person'), ['template' => 'contact/form']);
	}

	#[Post('|/contact/(?<id>\d+)$|')]
	public static function update(Request $req): Response {
		$id = $req->param('id');
		$person = ContactManager::update($id, $req->getPostData());
		return new Page(compact('id', 'person'), ['template' => 'contact/view']);
	}

}
