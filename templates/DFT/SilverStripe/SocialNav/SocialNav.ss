<% if $requireExtraCSS %>
    <% require css("dft/silverstripe-socialnav:client/dist/css/brands.min.css") %>
    <% require css("dft/silverstripe-socialnav:client/dist/css/styles.css") %>
<% end_if %>

<nav class="navigation navbar socialnav">
    <% if $MenuItems.exists %>
        <ul class="nav">
            <% loop $MenuItems %>
                <li class="{$ConvertedService} nav-item">
                    <a class="nav-link" href="{$URL}" <% if $Title %>title="{$Title}"<% end_if %>>
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
