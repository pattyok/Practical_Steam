<section id="slideshow" class="slideshow"> 
	<ul>
		<% loop Slides %> 
		<% if not Archived %>		
			<li>
				<a href="{$GoToURL}">
				<img src="<% with Image %>$URL<% end_with %>" alt="$Title.XML"/>
				<% if Title %>
					<div class="caption <% if FontColor %>white<% end_if %>">$Title 
					<div class="link">Learn more <span class="ps-sprite arrow black"></span></div>
					</div>
				<% end_if %>
			</a>
		</li>
			<% end_if %>
		<% end_loop %> 
	</ul>
</section>