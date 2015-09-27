<?php
require_once('../src/DeviceDetect.php');

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2015-02-14 at 15:15:32.
 */
class DeviceDetectTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var DeviceDetect
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new DeviceDetect;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers DeviceDetect::getUserAgent
     */
    public function testGetUserAgent()
    {
        $ua = 'Mozilla/5.0 (iPhone; CPU iPhone OS 5_1_1 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9B206 Safari/7534.48.3';
        $_SERVER['HTTP_USER_AGENT'] = $ua;
        $this->assertEquals($ua, $this->object->getUserAgent());

        $other = 'Mozilla/5.0 (Linux; U; Android 3.2; ja-jp; F-01D Build/F0001) AppleWebKit/534.13 (KHTML, like Gecko) Version/4.0 Safari/534.13';
        $this->assertEquals($other, $this->object->getUserAgent($other));

        $this->assertEquals($ua, $this->object->getUserAgent());
        unset($_SERVER['HTTP_USER_AGENT']);
    }

    /**
     * @covers DeviceDetect::isIos
     */
    public function testIsIos()
    {
        $ua = '';
        $this->assertFalse($this->object->isIos($ua));

        // iPhone
        $ua = 'Mozilla/5.0 (iPhone; U; CPU like Mac OS X; en) AppleWebKit/420+ (KHTML, like Gecko) Version/3.0 Mobile/1C28 Safari/419.3';
        $this->assertTrue($this->object->isIos($ua));

        // iPod
        $ua = 'Mozilla/5.0 (iPod; CPU iPhone OS 5_0_1 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A405 Safari/7534.48.3';
        $this->assertTrue($this->object->isIos($ua));

        // iPad
        $ua = 'Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B367 Safari/531.21.10';
        $this->assertTrue($this->object->isIos($ua));

        $ua = 'Mozilla/5.0 (iPod touch; CPU iPhone OS 7_1_2 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Version/7.0 Mobile/11D257 Safari/9537.53';
        $this->assertTrue($this->object->isIos($ua));
    }

    /**
     * @covers DeviceDetect::isAndroid
     */
    public function testIsAndroid()
    {
        // false
        $ua = '';
        $this->assertFalse($this->object->isAndroid($ua));

        $ua = 'DoCoMo/2.0 F901iC(c100;TB;W18H10)';
        $this->assertFalse($this->object->isAndroid($ua));

        // true
        $ua = 'Mozilla/5.0 (Linux; Android 4.1.1; Nexus 7 Build/JRO03S) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.166 Safari/535.19';
        $this->assertTrue($this->object->isAndroid($ua));
    }

    /**
     * @covers DeviceDetect::isWindowsPhone
     */
    public function testIsWindowsPhone()
    {
        // false
        $ua = '';
        $this->assertFalse($this->object->isWindowsPhone($ua));

        $ua = 'DoCoMo/2.0 F901iC(c100;TB;W18H10)';
        $this->assertFalse($this->object->isAndroid($ua));

        // true
        $ua = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; KDDI-TS01; Windows Phone 6.5.3.5)';
        $this->assertTrue($this->object->isWindowsPhone($ua));
        
        $ua = 'Mozilla/5.0 (compatible; MSIE 9.0; Windows Phone OS 7.5; Trident/5.0; IEMobile/9.0; FujitsuToshibaMobileCommun; IS12T; KDDI)';
        $this->assertTrue($this->object->isWindowsPhone($ua));
    }

    /**
     * @covers DeviceDetect::isIe
     */
    public function testIsIe()
    {
        // false
        $ua = '';
        $this->assertFalse($this->object->isIe($ua));

        $ua = 'DoCoMo/2.0 F901iC(c100;TB;W18H10)';
        $this->assertFalse($this->object->isIe($ua));

        $ua = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; KDDI-TS01; Windows Phone 6.5.3.5)';
        $this->assertFalse($this->object->isIe($ua));

        // true
        $ua = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows XP)';
        $this->assertTrue($this->object->isIe($ua));

        $ua = 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; ARM; Trident/6.0)';
        $this->assertTrue($this->object->isIe($ua));
    }

    /**
     * @covers DeviceDetect::isChrome
     */
    public function testIsChrome()
    {
        // false
        $ua = '';
        $this->assertFalse($this->object->isChrome($ua));

        $ua = 'DoCoMo/2.0 F901iC(c100;TB;W18H10)';
        $this->assertFalse($this->object->isChrome($ua));

        $ua = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; KDDI-TS01; Windows Phone 6.5.3.5)';
        $this->assertFalse($this->object->isChrome($ua));

        $ua = 'Mozilla/5.0 (Linux; Android 4.1.1; Nexus 7 Build/JRO03S) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.166 Safari/535.19';
        $this->assertFalse($this->object->isChrome($ua));

        // true
        $ua = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.52 Safari/537.36';
        $this->assertTrue($this->object->isChrome($ua));

        $ua = 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.63 Safari/537.36'; 
        $this->assertTrue($this->object->isChrome($ua));
    }

    /**
     * @covers DeviceDetect::isFirefox
     */
    public function testIsFirefox()
    {
        // false
        $ua = '';
        $this->assertFalse($this->object->isFirefox($ua));

        $ua = 'DoCoMo/2.0 F901iC(c100;TB;W18H10)';
        $this->assertFalse($this->object->isFirefox($ua));

        $ua = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; KDDI-TS01; Windows Phone 6.5.3.5)';
        $this->assertFalse($this->object->isFirefox($ua));

        // true
        $ua = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:9.0.1) Gecko/20100101 Firefox/9.0.1';
        $this->assertTrue($this->object->isFirefox($ua));

        $ua = 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:9.0.1) Gecko/20100101 Firefox/9.0.1';
        $this->assertTrue($this->object->isFirefox($ua));

        $ua = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; ja; rv:1.8.1.20) Gecko/20081217 Firefox/2.0.0.20';
        $this->assertTrue($this->object->isFirefox($ua));
    }

    /**
     * @covers DeviceDetect::isSafari
     */
    public function testIsSafari()
    {
        // false
        $ua = '';
        $this->assertFalse($this->object->isSafari($ua));

        $ua = 'DoCoMo/2.0 F901iC(c100;TB;W18H10)';
        $this->assertFalse($this->object->isSafari($ua));

        $ua = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; KDDI-TS01; Windows Phone 6.5.3.5)';
        $this->assertFalse($this->object->isSafari($ua));

        // true
        $ua = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/534.52.7 (KHTML, like Gecko) Version/5.1.2 Safari/534.52.7'; 
        $this->assertTrue($this->object->isSafari($ua));

        $ua = 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X; ja-jp) AppleWebKit/85.7 (KHTML, like Gecko) Safari/85.6';
        $this->assertTrue($this->object->isSafari($ua));
    }

    /**
     * @covers DeviceDetect::isDocomo
     */
    public function testIsDocomo()
    {
        // false
        $ua = '';
        $this->assertFalse($this->object->isDocomo($ua));

        $ua = 'KDDI-HI31 UP.Browser/6.2.0.5.c.1.100 (GUI) MMP/2.0';
        $this->assertFalse($this->object->isDocomo($ua));

        // true
        $ua = 'DoCoMo/2.0 F901iC(c100;TB;W18H10)';
        $this->assertTrue($this->object->isDocomo($ua));
    }

    /**
     * @covers DeviceDetect::isKddi
     */
    public function testIsKddi()
    {
        /// false
        $ua = '';
        $this->assertFalse($this->object->isKddi($ua));

        $ua = 'DoCoMo/2.0 F901iC(c100;TB;W18H10)';
        $this->assertFalse($this->object->isKddi($ua));

        $ua = 'Mozilla/5.0 (compatible; MSIE 9.0; Windows Phone OS 7.5; Trident/5.0; IEMobile/9.0; FujitsuToshibaMobileCommun; IS12T; KDDI)';
        $this->assertFalse($this->object->isKddi($ua));
        
        // true
        $ua = 'KDDI-HI31 UP.Browser/6.2.0.5.c.1.100 (GUI) MMP/2.0';
        $this->assertTrue($this->object->isKddi($ua));
    }

    /**
     * @covers DeviceDetect::isSoftbank
     */
    public function testIsSoftbank()
    {
        // false
        $ua = '';
        $this->assertFalse($this->object->isSoftbank($ua));

        $ua = 'DoCoMo/2.0 F901iC(c100;TB;W18H10)';
        $this->assertFalse($this->object->isSoftbank($ua));

        // true
        $ua = 'SoftBank/1.0/DM001SH/SHJ001/SN************ Browser/VF-NetFront/3.4 Profile/MIDP-2.0 Configuration/CLDC-1.1';
        $this->assertTrue($this->object->isSoftbank($ua));
    }

    /**
     * @covers DeviceDetect::isMobile
     */
    public function testIsMobile()
    {
        // false
        $ua = '';
        $this->assertFalse($this->object->isMobile($ua));

        $ua = 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_1_2 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Version/7.0 Mobile/11D257 Safari/9537.53';
        $this->assertFalse($this->object->isMobile($ua));

        // true
        $ua = 'DoCoMo/2.0 F901iC(c100;TB;W18H10)';
        $this->assertTrue($this->object->isMobile($ua));
    }

    public function testIsWillcom() {
        $ua = '';
        $this->assertFalse($this->object->isWillcom($ua));

        $ua = 'Mozilla/3.0 (DDIPOCKET;KYOCERA/AH-K3001V/1.5.2.8.000/0.1/C100) Opera 7.0';
        $this->assertTrue($this->object->isWillcom($ua));

        $ua = 'Mozilla/3.0(WILLCOM;KYOCERA/WX300K/1;1.0.2.8.000000/0.1/C100) Opera/7.0';
        $this->assertTrue($this->object->isWillcom($ua));
    }

    /**
     * @covers DeviceDetect::isSmartPhone
     * @todo   Implement testIsSmartPhone().
     */
    public function testIsSmartPhone()
    {
        $ua = '';
        $this->assertFalse($this->object->isSmartPhone($ua));

        // Softbank
        $ua = 'SoftBank/1.0/DM001SH/SHJ001/SN************ Browser/VF-NetFront/3.4 Profile/MIDP-2.0 Configuration/CLDC-1.1';
        $this->assertFalse($this->object->isSmartPhone($ua));

        //****** Smart Phone ********
        $ua = 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_1_2 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Version/7.0 Mobile/11D257 Safari/9537.53';
        $this->assertTrue($this->object->isSmartPhone($ua));

        $ua = 'Mozilla/5.0 (compatible; MSIE 9.0; Windows Phone OS 7.5; Trident/5.0; IEMobile/9.0; FujitsuToshibaMobileCommun; IS12T; KDDI)';
        $this->assertTrue($this->object->isSmartPhone($ua));
    }

    /**
     * @covers DeviceDetect::isAndroidIos
     * @todo   Implement testIsAndroidIos().
     */
    public function testIsAndroidIos()
    {
        $ua = '';
        $this->assertFalse($this->object->isAndroidIos($ua));

        $ua = 'Windows Phone';
        $this->assertFalse($this->object->isAndroidIos($ua));

        // Android
        $ua = 'Mozilla/5.0 (Linux; U; Android 4.0.1; ja-jp; Galaxy Nexus Build/ITL41D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30';
        $this->assertTrue($this->object->isAndroidIos($ua));

        // iOS
        $ua = 'Mozilla/5.0 (iPhone; CPU iPhone OS 8_0_2 like Mac OS X) AppleWebKit/600.1.4 (KHTML, like Gecko) Mobile/12A405';
        $this->assertTrue($this->object->isAndroidIos($ua));

    }

    /**
     * @covers DeviceDetect::getAndroidInfo
     * @todo   Implement testGetAndroidInfo().
     */
    public function testGetAndroidInfo()
    {
        $ua = 'Mozilla/5.0 (Linux; U; Android 2.1-update1; ja-jp; SonyEricssonSO-01B Build/2.0.2.B.0.29) AppleWebKit/530.17 (KHTML, like Gecko) Version/4.0 Mobile Safari/530.17';
        $expect = array(
                DeviceDetect::INFO_TYPE => 'android',
                DeviceDetect::INFO_NAME => 'android', 
                DeviceDetect::INFO_VERSION_MAJOR => 2,
                DeviceDetect::INFO_VERSION_MINOR => 1,
                DeviceDetect::INFO_VERSION_ETC => 0,
        );
        $this->assertEquals($expect, $this->object->getAndroidInfo($ua));

        $ua = 'Mozilla/5.0 (Linux; U; Android 4.0.1; ja-jp; Galaxy Nexus Build/ITL41D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30';
        $expect = array(
                DeviceDetect::INFO_TYPE => 'android',
                DeviceDetect::INFO_NAME => 'android', 
                DeviceDetect::INFO_VERSION_MAJOR => 4,
                DeviceDetect::INFO_VERSION_MINOR => 0,
                DeviceDetect::INFO_VERSION_ETC => 1,
        );
        $this->assertEquals($expect, $this->object->getAndroidInfo($ua));

        $ua = 'ios';
        $this->assertNull($this->object->getAndroidInfo($ua));
    }

    /**
     * @covers DeviceDetect::getIosInfo
     */
    public function testGetIosInfo()
    {
        $ua = 'Mozilla/5.0 (iPhone; U; CPU like Mac OS X; en) AppleWebKit/420+ (KHTML, like Gecko) Version/3.0 Mobile/1C28 Safari/419.3';
        $expect = array(
                DeviceDetect::INFO_TYPE => 'ios',
                DeviceDetect::INFO_NAME => 'iphone', 
                DeviceDetect::INFO_VERSION_MAJOR => 1,
                DeviceDetect::INFO_VERSION_MINOR => 0,
                DeviceDetect::INFO_VERSION_ETC => 0,
        );
        $this->assertEquals($expect, $this->object->getIosInfo($ua));
        
        $ua = 'Mozilla/5.0 (iPad; U; CPU OS 4_3_5 like Mac OS X; ja-jp) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8L1 Safari/6533.18.5';
        $expect = array(
                DeviceDetect::INFO_TYPE => 'ios',
                DeviceDetect::INFO_NAME => 'ipad', 
                DeviceDetect::INFO_VERSION_MAJOR => 4,
                DeviceDetect::INFO_VERSION_MINOR => 3,
                DeviceDetect::INFO_VERSION_ETC => 5,
        );
        $this->assertEquals($expect, $this->object->getIosInfo($ua));

        $ua = 'Mozilla/5.0 (iPod; CPU iPhone OS 5_0_1 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A405 Safari/7534.48.3';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'ios',
            DeviceDetect::INFO_NAME => 'ipod', 
            DeviceDetect::INFO_VERSION_MAJOR => 5,
            DeviceDetect::INFO_VERSION_MINOR => 0,
            DeviceDetect::INFO_VERSION_ETC => 1,
        );
        $this->assertEquals($expect, $this->object->getIosInfo($ua));

        $ua = 'Mozilla/5.0 (iPhone; CPU iPhone OS 8_0_2 like Mac OS X) AppleWebKit/600.1.4 (KHTML, like Gecko) Mobile/12A405';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'ios',
            DeviceDetect::INFO_NAME => 'iphone', 
            DeviceDetect::INFO_VERSION_MAJOR => 8,
            DeviceDetect::INFO_VERSION_MINOR => 0,
            DeviceDetect::INFO_VERSION_ETC => 2,
        );
        $this->assertEquals($expect, $this->object->getIosInfo($ua));

        $ua = 'Mozilla/5.0 (iPod touch; CPU iPhone OS 7_1_2 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Version/7.0 Mobile/11D257 Safari/9537.53';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'ios',
            DeviceDetect::INFO_NAME => 'ipod', 
            DeviceDetect::INFO_VERSION_MAJOR => 7,
            DeviceDetect::INFO_VERSION_MINOR => 1,
            DeviceDetect::INFO_VERSION_ETC => 2,
        );
        $this->assertEquals($expect, $this->object->getIosInfo($ua));

        $ua = 'Android';
        $this->assertNull($this->object->getIosInfo($ua));
    }

    /**
     * @covers DeviceDetect::getDocomoInfo
     */
    public function testGetDocomoInfo()
    {
        $ua = 'Mozilla/5.0 (iPhone; U; CPU like Mac OS X; en) AppleWebKit/420+ (KHTML, like Gecko) Version/3.0 Mobile/1C28 Safari/419.3';
        $this->assertNull($this->object->getDocomoInfo($ua));

        $ua = 'DoCoMo/2.0 F901iC(c100;TB;W18H10)';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'docomo',
            DeviceDetect::INFO_NAME => 'f901ic', 
            DeviceDetect::INFO_VERSION_MAJOR => 2,
            DeviceDetect::INFO_VERSION_MINOR => 0,
            DeviceDetect::INFO_VERSION_ETC => 0,
        );
        $this->assertEquals($expect, $this->object->getDocomoInfo($ua));

        $ua = 'DoCoMo/1.0/SH506iC/c20/TB/W20H10';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'docomo',
            DeviceDetect::INFO_NAME => 'sh506ic', 
            DeviceDetect::INFO_VERSION_MAJOR => 1,
            DeviceDetect::INFO_VERSION_MINOR => 0,
            DeviceDetect::INFO_VERSION_ETC => 0,
        );
        $this->assertEquals($expect, $this->object->getDocomoInfo($ua));
    }

    /**
     * @covers DeviceDetect::getKddiInfo
     */
    public function testGetKddiInfo()
    {
        $ua = 'KDDI-HI31 UP.Browser/6.2.0.5.c.1.100 (GUI) MMP/2.0';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'kddi',
            DeviceDetect::INFO_NAME => 'hi31', 
            DeviceDetect::INFO_VERSION_MAJOR => 6,
            DeviceDetect::INFO_VERSION_MINOR => 2,
            DeviceDetect::INFO_VERSION_ETC => 0,
        );
        $this->assertEquals($expect, $this->object->getKddiInfo($ua));

        $ua = 'KDDI-SN23 UP.Browser/6.0.8.2 (GUI) MMP/1.1';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'kddi',
            DeviceDetect::INFO_NAME => 'sn23', 
            DeviceDetect::INFO_VERSION_MAJOR => 6,
            DeviceDetect::INFO_VERSION_MINOR => 0,
            DeviceDetect::INFO_VERSION_ETC => 8,
        );
        $this->assertEquals($expect, $this->object->getKddiInfo($ua));
    }

    /**
     * @covers DeviceDetect::getSoftbankInfo
     */
    public function testGetSoftbankInfo()
    {
        $ua = 'SoftBank/1.0/DM001SH/SHJ001/SN************ Browser/VF-NetFront/3.4 Profile/MIDP-2.0 Configuration/CLDC-1.1';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'softbank',
            DeviceDetect::INFO_NAME => 'dm001sh', 
            DeviceDetect::INFO_VERSION_MAJOR => 1,
            DeviceDetect::INFO_VERSION_MINOR => 0,
            DeviceDetect::INFO_VERSION_ETC => 0,
        );
        $this->assertEquals($expect, $this->object->getSoftbankInfo($ua));

        $ua = 'Vodafone/1.0/V904SH/SHJ001/SN************ Browser/VF-NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'softbank',
            DeviceDetect::INFO_NAME => 'v904sh', 
            DeviceDetect::INFO_VERSION_MAJOR => 1,
            DeviceDetect::INFO_VERSION_MINOR => 0,
            DeviceDetect::INFO_VERSION_ETC => 0,
        );
        $this->assertEquals($expect, $this->object->getSoftbankInfo($ua));
    }

    /**
     * @covers DeviceDetect::getWillcomInfo
     */
    public function testGetWillcomInfo()
    {
        $ua = 'Mozilla/3.0(WILLCOM;SANYO/WX310SA/2;1/1/C128) NetFront/3.3';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'willcom',
            DeviceDetect::INFO_NAME => 'willcom', 
            DeviceDetect::INFO_VERSION_MAJOR => '',
            DeviceDetect::INFO_VERSION_MINOR => '',
            DeviceDetect::INFO_VERSION_ETC => '',
        );
        $this->assertEquals($expect, $this->object->getWillcomInfo($ua));

        $ua = 'Mozilla/3.0 (DDIPOCKET;KYOCERA/AH-K3001V/1.5.2.8.000/0.1/C100) Opera 7.0';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'willcom',
            DeviceDetect::INFO_NAME => 'ddipocket', 
            DeviceDetect::INFO_VERSION_MAJOR => '',
            DeviceDetect::INFO_VERSION_MINOR => '',
            DeviceDetect::INFO_VERSION_ETC => '',
        );
        $this->assertEquals($expect, $this->object->getWillcomInfo($ua));
    }

    /**
     * @covers DeviceDetect::getIeInfo
     */
    public function testGetIeInfo()
    {
        $ua = 'Mozilla/3.0(WILLCOM;SANYO/WX310SA/2;1/1/C128) NetFront/3.3';
        $this->assertNull($this->object->getIeInfo($ua));

        $ua = 'Mozilla/3.0 (DDIPOCKET;KYOCERA/AH-K3001V/1.5.2.8.000/0.1/C100) Opera 7.0';
        $this->assertNull($this->object->getIeInfo($ua));

        $ua = 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Win64; x64; Trident/6.0)';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'ie',
            DeviceDetect::INFO_NAME => 'ie', 
            DeviceDetect::INFO_VERSION_MAJOR => 10,
            DeviceDetect::INFO_VERSION_MINOR => 0,
            DeviceDetect::INFO_VERSION_ETC => '',
        );
        $this->assertEquals($expect, $this->object->getIeInfo($ua));
    }

    /**
     * @covers DeviceDetect::getChromeInfo
     */
    public function testGetChromeInfo()
    {
        $ua = 'Mozilla/3.0(WILLCOM;SANYO/WX310SA/2;1/1/C128) NetFront/3.3';
        $this->assertNull($this->object->getChromeInfo($ua));

        $ua = 'Mozilla/3.0 (DDIPOCKET;KYOCERA/AH-K3001V/1.5.2.8.000/0.1/C100) Opera 7.0';
        $this->assertNull($this->object->getChromeInfo($ua));

        $ua = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.52 Safari/537.36';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'chrome',
            DeviceDetect::INFO_NAME => 'chrome', 
            DeviceDetect::INFO_VERSION_MAJOR => 28,
            DeviceDetect::INFO_VERSION_MINOR => 0,
            DeviceDetect::INFO_VERSION_ETC => '1500.52',
        );
        $this->assertEquals($expect, $this->object->getChromeInfo($ua));

        $ua = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/534.3 (KHTML, like Gecko) Chrome/6.0.472.55 Safari/534.3';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'chrome',
            DeviceDetect::INFO_NAME => 'chrome', 
            DeviceDetect::INFO_VERSION_MAJOR => 6,
            DeviceDetect::INFO_VERSION_MINOR => 0,
            DeviceDetect::INFO_VERSION_ETC => '472.55',
        );
        $this->assertEquals($expect, $this->object->getChromeInfo($ua));

        $ua = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_3) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'chrome',
            DeviceDetect::INFO_NAME => 'chrome', 
            DeviceDetect::INFO_VERSION_MAJOR => 26,
            DeviceDetect::INFO_VERSION_MINOR => 0,
            DeviceDetect::INFO_VERSION_ETC => '1410.43',
        );
        $this->assertEquals($expect, $this->object->getChromeInfo($ua));
    }

    /**
     * @covers DeviceDetect::getFirefoxInfo
     */
    public function testGetFirefoxInfo()
    {
        $ua = 'Mozilla/3.0(WILLCOM;SANYO/WX310SA/2;1/1/C128) NetFront/3.3';
        $this->assertNull($this->object->getFirefoxInfo($ua));

        $ua = 'Mozilla/3.0 (DDIPOCKET;KYOCERA/AH-K3001V/1.5.2.8.000/0.1/C100) Opera 7.0';
        $this->assertNull($this->object->getFirefoxInfo($ua));

        $ua = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.52 Safari/537.36';
        $this->assertNull($this->object->getFirefoxInfo($ua));

        $ua = 'Mozilla/5.0 (Windows; U; Win98; nl-NL; rv:1.7.5) Gecko/20041202 Firefox/1.0';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'firefox',
            DeviceDetect::INFO_NAME => 'firefox', 
            DeviceDetect::INFO_VERSION_MAJOR => 1,
            DeviceDetect::INFO_VERSION_MINOR => 0,
            DeviceDetect::INFO_VERSION_ETC => '',
        );
        $this->assertEquals($expect, $this->object->getFirefoxInfo($ua));

        $ua = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:9.0.1) Gecko/20100101 Firefox/9.0.1';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'firefox',
            DeviceDetect::INFO_NAME => 'firefox', 
            DeviceDetect::INFO_VERSION_MAJOR => 9,
            DeviceDetect::INFO_VERSION_MINOR => 0,
            DeviceDetect::INFO_VERSION_ETC => 1,
        );
        $this->assertEquals($expect, $this->object->getFirefoxInfo($ua));
    }

    /**
     * @covers DeviceDetect::getSafariInfo
     */
    public function testGetSafariInfo()
    {
        $ua = 'Mozilla/3.0(WILLCOM;SANYO/WX310SA/2;1/1/C128) NetFront/3.3';
        $this->assertNull($this->object->getSafariInfo($ua));

        $ua = 'Mozilla/5.0 (iPod; CPU iPhone OS 5_0_1 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A405 Safari/7534.48.3';
        $this->assertNull($this->object->getSafariInfo($ua));

        $ua = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.52 Safari/537.36';
        $this->assertNull($this->object->getSafariInfo($ua));

        $ua = 'Mozilla/5.0 (Windows; U; Win98; nl-NL; rv:1.7.5) Gecko/20041202 Firefox/1.0';
        $this->assertNull($this->object->getSafariInfo($ua));

        // true
        $ua = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/534.52.7 (KHTML, like Gecko) Version/5.1.2 Safari/534.52.7'; 
        $expect = array(
            DeviceDetect::INFO_TYPE => 'safari',
            DeviceDetect::INFO_NAME => 'safari', 
            DeviceDetect::INFO_VERSION_MAJOR => 534,
            DeviceDetect::INFO_VERSION_MINOR => 52,
            DeviceDetect::INFO_VERSION_ETC => 7,
        );
        $this->assertEquals($expect, $this->object->getSafariInfo($ua));

        $ua = 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X; ja-jp) AppleWebKit/85.7 (KHTML, like Gecko) Safari/85.6';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'safari',
            DeviceDetect::INFO_NAME => 'safari', 
            DeviceDetect::INFO_VERSION_MAJOR => 85,
            DeviceDetect::INFO_VERSION_MINOR => 6,
            DeviceDetect::INFO_VERSION_ETC => '',
        );
        $this->assertEquals($expect, $this->object->getSafariInfo($ua));
    }

    /**
     * @covers DeviceDetect::getOperaInfo
     */
    public function testGetOperaInfo()
    {
        $ua = 'Mozilla/3.0(WILLCOM;SANYO/WX310SA/2;1/1/C128) NetFront/3.3';
        $this->assertNull($this->object->getOperaInfo($ua));

        $ua = 'Mozilla/5.0 (iPod; CPU iPhone OS 5_0_1 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A405 Safari/7534.48.3';
        $this->assertNull($this->object->getOperaInfo($ua));

        $ua = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.52 Safari/537.36';
        $this->assertNull($this->object->getOperaInfo($ua));

        $ua = 'Mozilla/5.0 (Windows; U; Win98; nl-NL; rv:1.7.5) Gecko/20041202 Firefox/1.0';
        $this->assertNull($this->object->getOperaInfo($ua));

        // true
        $ua = 'Opera/9.80 (Macintosh; Intel Mac OS X; U; en) Presto/2.2.15 Version/10.00';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'opera',
            DeviceDetect::INFO_NAME => 'opera', 
            DeviceDetect::INFO_VERSION_MAJOR => 10,
            DeviceDetect::INFO_VERSION_MINOR => 0,
            DeviceDetect::INFO_VERSION_ETC => '',
        );
        $this->assertEquals($expect, $this->object->getOperaInfo($ua));

        $ua = 'Mozilla/4.0 (Windows 95;US) Opera 3.62 [en]';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'opera',
            DeviceDetect::INFO_NAME => 'opera', 
            DeviceDetect::INFO_VERSION_MAJOR => 3,
            DeviceDetect::INFO_VERSION_MINOR => 62,
            DeviceDetect::INFO_VERSION_ETC => '',
        );
        $this->assertEquals($expect, $this->object->getOperaInfo($ua));
    }

    /**
     * @covers DeviceDetect::getSmartPhoneInfo
     */
    public function testGetSmartPhoneInfo()
    {
        $ua = 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_3 like Mac OS X; ja-jp) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8F190 Safari/6533.18.5';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'ios',
            DeviceDetect::INFO_NAME => 'iphone', 
            DeviceDetect::INFO_VERSION_MAJOR => 4,
            DeviceDetect::INFO_VERSION_MINOR => 3,
            DeviceDetect::INFO_VERSION_ETC => 0,
        );
        $this->assertEquals($expect, $this->object->getSmartPhoneInfo($ua));

        $ua = 'Mozilla/5.0 (Linux; U; Android 2.3.4; ja-jp; IS05 Build/S9290) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'android',
            DeviceDetect::INFO_NAME => 'android', 
            DeviceDetect::INFO_VERSION_MAJOR => 2,
            DeviceDetect::INFO_VERSION_MINOR => 3,
            DeviceDetect::INFO_VERSION_ETC => 4,
        );
        $this->assertEquals($expect, $this->object->getSmartPhoneInfo($ua));

        $ua = 'Mozilla/5.0 (compatible; MSIE 9.0; Windows Phone OS 7.5; Trident/5.0; IEMobile/9.0; FujitsuToshibaMobileCommun; IS12T; KDDI)';
        $expect = array(
            DeviceDetect::INFO_TYPE => 'windows phone',
            DeviceDetect::INFO_NAME => 'windows phone', 
            DeviceDetect::INFO_VERSION_MAJOR => 7,
            DeviceDetect::INFO_VERSION_MINOR => 5,
            DeviceDetect::INFO_VERSION_ETC => 0,
        );
        $this->assertEquals($expect, $this->object->getSmartPhoneInfo($ua));
    }

    /**
     * @covers DeviceDetect::getDeviceType
     */
    public function testGetDeviceType()
    {
        $ua = '';
        $this->assertEmpty($this->object->getDeviceType($ua));

        $ua = 'DoCoMo';
        $this->assertEquals('docomo', $this->object->getDeviceType($ua));

        $ua = 'DoCoMo/2.0 F901iC(c100;TB;W18H10)';
        $this->assertEquals('docomo', $this->object->getDeviceType($ua));

        $ua = 'Mozilla/5.0 (iPhone; CPU iPhone OS 5_1_1 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9B206 Safari/7534.48.3';
        $this->assertEquals('ios', $this->object->getDeviceType($ua));

        $ua = 'Mozilla/5.0 (Linux; U; Android 3.2; ja-jp; F-01D Build/F0001) AppleWebKit/534.13 (KHTML, like Gecko) Version/4.0 Safari/534.13';
        $this->assertEquals('android', $this->object->getDeviceType($ua));

        $ua = 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)';
        $this->assertEquals('ie', $this->object->getDeviceType($ua));

        $ua = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_3) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31';
        $this->assertEquals('chrome', $this->object->getDeviceType($ua));

        $ua = 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X; ja-jp) AppleWebKit/85.7 (KHTML, like Gecko) Safari/85.6';
        $this->assertEquals('safari', $this->object->getDeviceType($ua));
    }

 
    /**
     * @covers DeviceDetect::isEnableFileApi
     */
    public function testIsEnableFileApi()
    {
        // false
        $ua = '';
        $this->assertFalse($this->object->isEnableFileApi($ua));

        $ua = 'DoCoMo';
        $this->assertFalse($this->object->isEnableFileApi($ua));

        $ua = 'DoCoMo/2.0 F901iC(c100;TB;W18H10)';
        $this->assertFalse($this->object->isEnableFileApi($ua));

        $ua = 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)';
        $this->assertFalse($this->object->isEnableFileApi($ua));

        $ua = 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_3; en-US) AppleWebKit/533.4 (KHTML, like Gecko) Chrome/5.0.375.55 Safari/533.4';
        $this->assertFalse($this->object->isEnableFileApi($ua));

        $ua = 'Mozilla/5.0 (Windows; U; Windows NT 6.0; ja; rv:1.9.0.17) Gecko/2009122116 Firefox/3.0.17 GTB6 (.NET CLR 3.5.30729)';
        $this->assertFalse($this->object->isEnableFileApi($ua));

        $ua = 'Mozilla/5.0 (Linux; U; Android 3.2; ja-jp; F-01D Build/F0001) AppleWebKit/534.13 (KHTML, like Gecko) Version/4.0 Safari/534.13';
        $this->assertFalse($this->object->isEnableFileApi($ua));

        // true
        $ua = 'Mozilla/5.0 (iPhone; CPU iPhone OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A403 Safari/8536.25';
        $this->assertTrue($this->object->isEnableFileApi($ua));

        $ua = 'Mozilla/5.0 (Linux; U; Android 4.0.3; ja-jp; Sony Tablet S Build/TISU0R0110) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Safari/534.30';
        $this->assertTrue($this->object->isEnableFileApi($ua));

        $ua = 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Win64; x64; Trident/6.0)';
        $this->assertTrue($this->object->isEnableFileApi($ua));

        $ua = 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.7 (KHTML, like Gecko) Chrome/7.0.517.43 Safari/534.7';
        $this->assertTrue($this->object->isEnableFileApi($ua));

        $ua = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.5; rv:2.0) Gecko/20100101 Firefox/4.0';
        $this->assertTrue($this->object->isEnableFileApi($ua));
    }

}
