{% extends "base.tpl" %}

{% block content %}
<div id="password_reset">
	<form method="post" id="password_reset_form" name="form" action="password_reset.php">
		Neues Passwort: <input type="password" name="password"><br />
					 Nochmal: <input type="password" name="password_confirm"><br />
		<input type="hidden" name="key" value="{{ key }}">
		<input id="submit" type="submit" name="submit" value="Passwort ändern">
	</form>
</div>
{% endblock %}