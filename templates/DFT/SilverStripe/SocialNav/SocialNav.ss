<% if $requireExtraCSS %>
    <% require css("dft/silverstripe-socialnav:client/dist/css/brands.min.css") %>
<% end_if %>

<nav class="nav navigation navbar socialnav">
    <% if $MenuItems.exists %>
        <ul>
            <% loop $MenuItems %>
                <li class="{$ConvertedService}">
                    <a href="{$URL}" <% if $Title %>title="{$Title}"<% end_if %>>
                        <i class="{$ServiceIcon} {$ExtraClasses}"></i>
                        <span style="display: none" aria-hidden="true">
                            {$Title}
                        </span>
                    </a>
                </li>
            <% end_loop %>
        </ul>
    <% end_if %>
</nav>
