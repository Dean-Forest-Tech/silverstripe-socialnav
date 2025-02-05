<nav class="nav navigation navbar socialnav">
    <% if $MenuItems.exists %>
        <ul>
            <% loop $MenuItems %>
                <li class="{$ConvertedService}">
                    <a href="{$URL}" <% if $Title %>title="{$Title}"<% end_if %>>
                        <span class="{$ConvertedService} {$ExtraClasses}">
                            <img
                                src="{$Top.BaseHref}socialnav/images/{$ConvertedService}.png"
                                alt="{$Service}"
                            />
                        </span>
                    </a>
                </li>
            <% end_loop %>
        </ul>
    <% end_if %>
</nav>
