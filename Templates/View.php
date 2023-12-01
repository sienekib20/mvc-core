<?php

namespace Gbs\Kibo\Templates;

class View
{
	private string $pageTitle = 'Home';
	private ?string $layout = null;
	private ?string $path = null;

	public function __construct($path)
	{
		$this->path = $path;
	}

	public function layout(string $layout)
	{
		$this->layout = $layout;
		return $this;
	}

	public function setTitle(string $title)
	{
		$this->pageTitle = $title;
		return $this;
	}

	public function make(string $view, array $params = [])
	{
		$view = $this->renderView($view, $params);
		if (($layout = $this->defineLayout()) != null) {
			echo str_replace(['{{contain}}', '{{title}}'],[$view, $this->pageTitle], $layout);
			exit;
		}
		echo str_replace('{{title}}', $this->pageTitle, $view);
		exit;
	}

	private function defineLayout()
	{
		if ($this->layout != null) {
			ob_start();
			include view_path() . "/layouts/{$this->layout}";
			return ob_get_clean();
		}
		return $this->layout;
	}

	private function renderView(string $view, array $params)
	{
		if (str_contains($view, '.')) {
			$views = explode('.', $view);
			foreach($views as $view) {
				if (is_dir($this->path.$view)) {
					$this->path .= $view . '/';
				}
			}
			$view = $this->path . end($views) . env('FILE_EXTENSION', '.php');
		} else {
			$view = $this->path . $view . env('FILE_EXTENSION', '.php');
		}

		foreach ($params as $key => $value) {
			$$key = $value;
		}

		if (!file_exists($view)) {
			die ('Tela não encontrada');
		}

		ob_start();
		include $view;
		return ob_get_clean();
	}

}