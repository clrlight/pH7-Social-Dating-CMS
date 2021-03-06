<?php
/**
 * @author         Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright      (c) 2014-2018, Pierre-Henry Soria. All Rights Reserved.
 * @license        GNU General Public License; See PH7.LICENSE.txt and PH7.COPYRIGHT.txt in the root directory.
 * @package        PH7 / App / System / Core / Form
 */

namespace PH7;

class ShareEmbedCoreForm
{
    /**
     * Embed code
     *
     * @param string $sFileUrl
     * @param integer $iEmbedWidth Width of the embed code.
     * @param integer $iEmbedHeight Height of the embed code.
     * @param integer $iWidth Width of the form in pixel.
     *
     * @return void
     */
    public static function display($sFileUrl, $iEmbedWidth = 580, $iEmbedHeight = 450, $iWidth = null)
    {
        $sEmbedCode = '<object codebase="http://www.adobe.com/go/getflashplayer" width="' . $iEmbedWidth . '" height="' . $iEmbedHeight . '" align="middle">
        <param name="movie" value="' . $sFileUrl . '" /><param name="quality" value="high" />
        <embed src="' . $sFileUrl . '" width="' . $iEmbedWidth . '" height="' . $iEmbedHeight . '" align="middle" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
        </object>';

        $oForm = new \PFBC\Form('form_share_embed', $iWidth);
        $oForm->configure(array('class' => 'center'));
        $oForm->addElement(new \PFBC\Element\Textarea(t('Embed Code'), 'embed', array('value' => $sEmbedCode, 'readonly' => 'readonly', 'onclick' => 'this.select()')));
        $oForm->addElement(new \PFBC\Element\HTMLExternal('<br />'));
        $oForm->render();
    }
}
