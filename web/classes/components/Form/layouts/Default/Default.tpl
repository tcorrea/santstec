<div class="sys_yola_form<% if $system.mobile %> sys_yola_form_mobile<% /if %>">

    <% if $posted == false || $failed == true %>

        <%if $data.heading neq ''%>
            <h2><% $data.heading %></h2>
        <%/if%>

        <form method='post' accept-charset="UTF-8" action='<% $formServicePath %>/<%$locale%>/<%$userId%>/<%$siteId%>/<%$pageId%>/<%$widgetId%>/'>

            <% foreach from=$data.fields item=field %>

                <div class='yola-form-field'>

                    <%if $field.type eq 'paragraph' %>
                        <p class='form-paragraph'><% $field.label %></p>
                    <%elseif $field.label neq '' %>
                        <%if $field.type neq 'radio' && $field.type neq 'checkbox' %>
                            <p class='label'><label for='yola_form_widget_<%$widgetId%>_<%$field.id%>'><% $field.label %></label></p>
                        <%else%>
                            <p class='label'><% $field.label %></p>
                        <%/if%>
                    <%/if%>

                    <%if $field.type eq 'text' %>
                        <input id='yola_form_widget_<%$widgetId%>_<%$field.id%>' class='text' name='<%$field.id%><text>' type='text' value='<%$field.defaultValue|escape:'html'%>'
                            <% if $_SYSTEM_MODE == 'DESIGN' %> readonly='readonly'<% /if %> >
                    <%elseif $field.type eq 'textarea' %>
                        <textarea id='yola_form_widget_<%$widgetId%>_<%$field.id%>' name='<%$field.id%><textarea>'
                            <% if $_SYSTEM_MODE == 'DESIGN' %> readonly='readonly'<% /if %> ><%$field.defaultValue|escape:'html'%></textarea>
                     <%elseif $field.type eq 'email' %>
                        <input id='yola_form_widget_<%$widgetId%>_<%$field.id%>' class='email' name='<%$field.id%><text>' type='email' value='<%$field.defaultValue|escape:'html'%>'
                            <% if $_SYSTEM_MODE == 'DESIGN' %> readonly='readonly'<% /if %> >
                    <%elseif $field.type eq 'tel' %>
                        <input id='yola_form_widget_<%$widgetId%>_<%$field.id%>' class='tel' name='<%$field.id%><text>' type='tel' value='<%$field.defaultValue|escape:'html'%>'
                            <% if $_SYSTEM_MODE == 'DESIGN' %> readonly='readonly'<% /if %> >
                    <%elseif $field.type eq 'url' %>
                        <input id='yola_form_widget_<%$widgetId%>_<%$field.id%>' class='url' name='<%$field.id%><text>' type='url' value='<%$field.defaultValue|escape:'html'%>'
                            <% if $_SYSTEM_MODE == 'DESIGN' %> readonly='readonly'<% /if %> >
                    <%elseif $field.type eq 'radio' %>
                        <% foreach from=$field.options item=option key=option_index %>
                            <input class='radio' id='yola_form_widget_<%$widgetId%>_<%$field.id%>_<%$option_index%>' type='radio'<%if $option.checked eq 'true' %> checked='checked'<%/if%> name='<%$field.id%><radio>' value='<%$option.label|escape:'html'%>'<% if $_SYSTEM_MODE == 'DESIGN' %> readonly='readonly'<% /if %> />
                            <label for='yola_form_widget_<%$widgetId%>_<%$field.id%>_<%$option_index%>'><%$option.label%></label>
                            <br />
                        <%/foreach%>
                    <%elseif $field.type eq 'checkbox' %>
                        <% foreach from=$field.options item=option key=option_index %>
                            <input class='checkbox' id='yola_form_widget_<%$widgetId%>_<%$field.id%>_<%$option_index%>' type='checkbox'<%if $option.checked eq 'true' %> checked='checked'<%/if%> name='<%$field.id%><checkbox>' value='<%$option.label|escape:'html'%>'<% if $_SYSTEM_MODE == 'DESIGN' %> readonly='readonly'<% /if %> />
                            <label for='yola_form_widget_<%$widgetId%>_<%$field.id%>_<%$option_index%>'><%$option.label%></label>
                            <br />
                        <%/foreach%>
                    <%elseif $field.type eq 'list' %>
                        <select id='yola_form_widget_<%$widgetId%>_<%$field.id%>' name='<%$field.id%><list>'<% if $_SYSTEM_MODE == 'DESIGN' %> readonly='readonly'<% /if %>>
                            <% foreach from=$field.options item=option %>
                                <option value='<%$option.label|escape:'html'%>'<%if $option.selected eq 'true' %> selected='selected'<%/if%>><%$option.label%></option><br />
                            <%/foreach%>
                        </select>
                    <%/if%>

                    <input type='hidden' name='<%$field.id%><label>' value='<%$field.label|escape:'html'%>'<% if $_SYSTEM_MODE == 'DESIGN' %> readonly='readonly'<% /if %> />

                </div>

            <% /foreach %>

            <input type='hidden' name='redirect' value='<%$redirect%>' />
            <input type='hidden' name='locale' value='<%$locale%>' />
            <input type='hidden' name='redirect_fail' value='<%$redirectFail%>' />
            <input type='hidden' name='form_name' value='<% $data.heading|escape:'html' %>' />
            <input type='hidden' name='site_name' value='<%$siteName|escape:'html'%>' />
            <input type='hidden' name='wl_site' value='<%$isWhiteLabel%>' />
            <% if $destination %>
            <input type='hidden' name='destination' value='<%$destination|escape:'html'%>' />
            <% /if %>

            <% include file="file:$templateDir/recaptcha.tpl" %>

            <% if $data.submit && $data.submit neq '' %>
                <p><input class='submit' type="submit" value="<% $data.submit %>"<% if $_SYSTEM_MODE == 'DESIGN' %> readonly='readonly'<% /if %> /></p>
            <% /if %>

        </form>

    <%/if%>

    <% if $posted == true %>

        <div class='yola-form-message'>

            <% if $failed neq true %>

                <p><%$successMessage%><p>

                <script type="text/javascript">
                    (function() {
                        if(typeof sw === 'object') {
                            sw.register_contact_form();
                        } else {
                            swRegisterManager.add(function() {
                                sw.register_contact_form();
                            });
                        }
                    }());
                </script>

            <%else%>

                <p><%TRANSLATE%>Form Post Failed. Please try again.<%/TRANSLATE%><p>

            <%/if%>

        </div>

    <%/if%>

</div>
