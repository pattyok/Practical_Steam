<div id="slideshow" class="slideshow"> 
	<% loop Slides %> 
		<% if not Archived %>		
		<div>
				<a href="$LinkedPage.Link" class="four">
				<img src="<% with Image %>$URL<% end_with %>" alt="$Title.XML"/>
				<% if Title %>
					<div class="caption <% if FontColor %>white<% end_if %>">$Title 
					<div class="link">Learn more <span class="ps-sprite arrow black"></span></div>
					</div>
				<% end_if %>
			</a>
		</div>
		<% end_if %>
	<% end_loop %> 
</div>