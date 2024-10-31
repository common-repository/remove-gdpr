<?php

namespace RemoveGDPR;

class GdprCommentFormFeatureRemover{

    public function removeCookiesAuthorizationFromDefaultCommentFields($fields){
        
        if((\get_option( 'gdpr-comment-opt-in' )) == false){
            $output = '
                <span class="comment-form-cookies-consent" style = "display: none;">
                    <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" checked />
                </span>
            ';
         }else{
/* Someone explain this to me. I couldn't get  remove_action( 'set_comment_cookies', 'wp_set_comment_cookies' ); to work. So I used JS to blank out the form.
 * this is not an ideal solution. Why doesn't remove action work?
 * This is incomrehensible to me:
 * https://core.trac.wordpress.org/ticket/44342
 */
             
            $output = '
                <span class="comment-form-cookies-consent" style = "display: none;">
                    <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="no"  />
                </span>
                <script>
                    document.getElementById("author").value = "";
                    document.getElementById("email").value = "";
                    document.getElementById("url").value = "";
                </script>
            ';
        }

        $fields['cookies'] = $output;

        return $fields;
        //$cookie_consent = TRUE;
   
    }
    
    public function addOptInToggle($fields){
        $l18nString = __('Save my name, email, and website in this browser for the next time I comment.');
        
        $checked = "";
        $checked = get_option('gdpr-comment-opt-in');
        if($checked == 1){
            $checked = "";
                       
            $fields['cookies'] =
            <<<output
<p class="comment-form-cookies-consent">
    <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" $checked />
    <label for="wp-comment-cookies-consent">$l18nString</label>
</p>
output;
            if (isset($_POST['wp-comment-cookies-consent'])){
                $fields['cookies'] = $fields['cookies'] . '<script>document.getElementById("wp-comment-cookies-consent").checked = true;alert("hi");</script>';
            }
            
        }else{
            $checked = "checked";

        //if (empty( $commenter['comment_author_email'] )){         $consent  = "checked";}

        $fields['cookies'] = 
<<<output
<p class="comment-form-cookies-consent">
    <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" $checked />
    <label for="wp-comment-cookies-consent">$l18nString</label>
</p>
output;
        }
        if (isset($_POST['wp-comment-cookies-consent'])){
            $fields['cookies'] = $fields['cookies'] . '<script>document.getElementById("wp-comment-cookies-consent").checked = true;alert("hi");</script>';
        }
        return $fields;
    }

}