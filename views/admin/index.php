<div class="wrap raptor-wrap">
    <div class="raptor-settings-form">
        <h2>WP Raptor Options</h2>

        <form method="post" action="" autocomplete="off">

            <?php $this->saveOptions(); ?>
            <?php settings_fields(self::RAPTOR_SETTINGS); ?>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="raptor-allow-in-place-editing">Allow in place editing</label>
                    </th>
                    <td>
                        <input id="raptor-allow-in-place-editing" type="checkbox" value="1" name="<?php echo self::INDEX_ALLOW_IN_PLACE_EDITING; ?>" <?php if ($options[self::INDEX_ALLOW_IN_PLACE_EDITING]): ?>checked="checked"<?php endif; ?> />
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">
                        <label for="raptor-raptorize-quickpress">Raptorize Quickpress</label>
                    </th>
                    <td>
                        <input id="raptor-raptorize-quickpress" type="checkbox" value="1"name="<?php echo self::INDEX_RAPTORIZE_QUICKPRESS; ?>" <?php if ($options[self::INDEX_RAPTORIZE_QUICKPRESS]): ?>checked="checked"<?php endif; ?> />
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">
                        <label for="raptor-admin-post-editing">Raptorize admin post editing</label>
                    </th>
                    <td>
                        <input id="raptor-admin-post-editing" type="checkbox" value="1" name="<?php echo self::INDEX_RAPTORIZE_ADMIN_EDITING; ?>" <?php if ($options[self::INDEX_RAPTORIZE_ADMIN_EDITING]): ?>checked="checked"<?php endif; ?> />
                    </td>
                </tr>
            </table>

            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
            </p>
        </form>
    </div>

    <div class="raptor-settings-information">
        <h2>WP Raptor's Roots</h2>
        <p>
            Plugin created by Michael Robinson, who lives at <a target="_blank" href="http://pagesofinterest.net/?utm_source=wp-raptor&utm_medium=admin-index&utm_content=michael-robinson&utm_campaign=wp-raptor" title="Michael Robinson!">pagesofinterest.net</a>, and uses Twitter.
            <br/>
            <br/>
            <a href="https://twitter.com/pagesofinterest" class="twitter-follow-button" data-show-count="false">Follow @pagesofinterest</a>
        </p>
        <hr/>
        <p>
            WP Raptor was built with <a target="_blank" href="http://raptor-editor.com/?utm_source=wp-raptor&utm_medium=admin-index&utm_content=raptor-editor&utm_campaign=wp-raptor">Raptor Editor</a>, this generation's WYSIWYG editor. Raptor lives between <a href="http://raptor-editor.com/" title="Raptor Editor">raptor-editor.com</a>, and Twitter.
            <br/>
            <br/>
            <a href="https://twitter.com/raptoreditor" class="twitter-follow-button" data-show-count="false">Follow @raptoreditor</a>
        </p>
        <hr/>
        <p>
            Raptor Editor in turn was built by the wonderful team at <a target="_blank" href="http://www.panmedia.co.nz/?utm_source=wp-raptor&utm_medium=admin-index&utm_content=panmedia&utm_campaign=wp-raptor">PANmedia</a>.
            <br/>
            Thanks PAN!
            <br/>
            <br/>
            <a href="https://twitter.com/panmedianz" class="twitter-follow-button" data-show-count="false">Follow @PANmediaNZ</a>
        </p>
    </div>

</div>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


















