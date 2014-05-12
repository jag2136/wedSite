<?php

/**
* Page class
*
* Abstraction for a boilerPlate page, with storage of the page name name
*
*/
class Page
{
	// Name of page
	private $pageName;
	private $pageTitle;

    // Static list of pages for reference
    public static $pageList = array(
        "Home"              => "home.php",
        "About Us"          => "aboutUs.php",
        "Proposal"          => "proposal.php",
        "Venue"             => "venue.php",
        "Wedding Party"     => "weddingParty.php",
        "Registry"          => "registry.php",
        "Guest Info"        => "guestInfo.php",
        "Photos & Fun"      => "photoFun.php",
        "RSVP"              => "rsvp.php"
    );

    // Directories common to wedSite root dir pages
    public static $contentDir   = "content";
    public static $imageDir     = "img";

	/**
	* Constructor
	*
	* Removes .php from pagename (if present)
	*
	* @param 		Name of page
	*
	*/
	public function __construct($pageName) {
		if(isset($pageName) && $pageName != "")
		{
			// Set up pageName (should not have .php ext) and pageTitle (human readable)
			$reversePageList = array_flip(self::$pageList);
			$this->pageTitle = $reversePageList[$pageName];

			$pageName = preg_replace("/.php$/", "", $pageName);
			$this->pageName = $pageName;
		}
		else
		{
			echo "Error: No pagename provided<br>\n";
		}
	}

	/**
	* Constructs HTML top of page
	* Builds included php, css, and js files
	*
	*/
	public function PageTop()
	{
		session_start();

		$html = <<<HTML
		<!DOCTYPE html>
		<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
		<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
		<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
		<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
		    <head>
		        <meta charset="utf-8">
		        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		        <title>Kym & Jason : $this->pageTitle</title>
		        <meta name="description" content="">
		        <meta name="viewport" content="width=device-width, initial-scale=1.0">

		        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
                <link rel="shortcut icon" href="img/smCircleIcon.png">

		        <!-- Boilerplate I think?
		        <link rel="stylesheet" href="css/normalize.css">
		        <link rel="stylesheet" href="css/main.css">-->

		        <!-- Bootstrap-->
				<link rel="stylesheet" href="css/bootstrap.min.css">
				<!--<link rel="stylesheet" href="css/bootstrap-responsive.min.css">

                <!-- Bootstrap
                <script src="js/bootstrap.min.js"></script>

		        <script src="js/vendor/modernizr-2.6.2.min.js"></script>-->

		        <!--[if lt IE 7]>
		            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		        <![endif]-->

		        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>

                <!-- jQuery UI -->
                <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
                <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

		        <!--<script src="js/plugins.js"></script>
		        <script src="js/main.js"></script>-->

HTML;

		echo $html;

		$this->includeCss($this->pageName);
		$this->includeJs($this->pageName);

		$html = <<<EOT
			</head>
			<body>
EOT;
		echo $html;

        $this->MenuAndBanner();
	}


    public function MenuAndBanner()
    {
        // Menu banner and links
        $menuLinkHtml = "";
        foreach(self::$pageList as $name => $link)
        {
            $linkRel = file_exists($link) ? "rel='$link'" : "";

            $menuLinkHtml .= "<div class='item'>\n";
            $menuLinkHtml .= "<div class='itemText' $linkRel>$name</div>\n";
            // Pink circle for current page
            if(strtoupper($link) == strtoupper($this->pageName . ".php"))
            {
                $menuLinkHtml .= "<div class='smCircle fRight mTop10 mRight10'>&nbsp;</div>\n";
            }
            $menuLinkHtml .= "</div>\n";
        }

        $hugeTitle      = $this->pageTitle;
        $hugeTitleClass = "hugeTitle";
        if($this->pageTitle == "Home")
        {
            $hugeTitle      = "9.27.14";
            $hugeTitleClass .= " ultraHuge";
        }

        $bannerImgHtml =<<<HTML
        <div class='bannerImg topBanner'>
            <div class='pattern'>
                <div class='contents'>
                    <div class='sectionSpacer'>&nbsp;</div>
                    <div class='$hugeTitleClass'>
                        <h1>$hugeTitle</h1>
                    </div>
                    <div class='menu fRight'>
                        $menuLinkHtml
                    </div>
                </div>
            </div>
        </div>
        <div class='bannerBtm'>
        </div>
        <div class='container'>
        <div class='sectionSpacer'>&nbsp;</div>
HTML;

        echo $bannerImgHtml;
    }

	/**
	* Retrieve name of page
	*
	* @return 		Page name
	*/
	public function GetPageName()
	{
		return $this->pageName;
	}

	/**
	* Set username in the session variable as part of creating session for authenticated user
	*
	*/
	public function UserSession($user_name) {
		$_SESSION["USER_NAME"] = $user_name;
	}

	/**
	* Wrapper around session_destroy to perform any necessary output/cleanup
	*
	*/
	public function EndSession() {
		$endedSession = $_SESSION;
		echo "<pre>Ending session:<br>\n";
		print_r($_SESSION);
		echo "</pre>\n";
		session_destroy();
	}

	/**
	* Displays HTML bottom of page
	*
	*/
	public function PageBtm() {
		$html = <<<EOT
				</div>
				<div class='sectionSpacer'>&nbsp;</div>
				<div class='pageBtm'>
				    <div class='container'>
				        <div class='containsFloats mTop10'>
                            <div class='whiteText uCase fRight'>Email Us</div>
				        </div>
				        <div class='containsFloats'>
				            <div class='whiteText fRight'>kymandjason1@gmail.com</div>

                            <div class='smCircle fRight mTop5 mRight10'>&nbsp;</div>
				        </div>
				    </div>
				</div>
			</body>
		</html>
EOT;
		echo $html;
	}

    public function includeCss($page) {

        // Common file first
        if(file_exists("./css/common.css"))
        {
            echo "<link rel='stylesheet' href='css/common.css'>\n";
        }

        // Page-specific file next (for overrides)
        if(file_exists("./css/$page.css"))
        {
            echo "<link rel='stylesheet' href='css/$page.css'>\n";
        }
    }

    public function includeJs($page) {

        // Common file first
        if(file_exists("./js/common.js"))
        {
            echo "<script src='js/common.js'></script>\n";
        }

        // Page-specific file next (for overrides)
        if(file_exists("./js/$page.js"))
        {
            echo "<script src='js/$page.js'></script>\n";
        }
    }


}

?>