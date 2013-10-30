<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class WPController extends Controller
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	public $clip_prefix = "<!-- wp_clip_";
	public $clip_postfix = " -->";

	public function getHeader() {
		ob_start(); // starts the internal buffer
			get_header(); // or get_footer, etc
		   $content = ob_get_contents(); //
		ob_end_clean();

		$content = $this->insertWPClips($content);

		return $content;
	}

	public function getFooter() {
		ob_start(); // starts the internal buffer
			get_footer(); // or get_footer, etc
			$content = ob_get_contents(); //
		ob_end_clean();

		$content = $this->insertWPClips($content);

		return $content;
	}

	public function insertWPClips($content) {
		$clips = $this->getWPClips($content);
		foreach ($clips as $clip) {
			$clip_name = str_replace(array($this->clip_prefix, $this->clip_postfix), "", $clip);
			if ($this->clips->contains($clip_name)) {

				$clipContent = $this->clips[$clip_name];
				$content = str_replace($clip, $clipContent, $content);
			}
		}
		return $content;

	}
	public function getWPClips($content) {
		$clip_count = substr_count($content, $this->clip_prefix);

		$clips = array();
		$position = 0;

		for ($i = 0; $i < $clip_count; $i++) {
			$start = strpos($content, $this->clip_prefix, $position);
			$end = strpos($content, $this->clip_postfix, $start) + 4;
			$clips[] = $full_clip = substr($content, $start, $end - $start);
			$position = $end;
		}

		return $clips;
	}
}