{% extends "base.tpl" %}

{% block content %}
<table class="chars">
	<thead>
		<tr>
			<th class="narrow">Avatar</th>
			<th>Name</th>
			<th>Realm</th>
			<th class="narrow">Level</th>
			<th>Money</th>
			<th class="narrow"></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="header" colspan="6">Main</td>
		</tr>
		{% if main %}
		<tr>
			<td class="narrow"><img src="{{ main|avatar }}" /></td>
			<td>{{ main.name }}</td>
			<td>{{ main.realm.name }}</td>
			<td class="narrow">{{ main.level }}</td>
			<td>{{ main.money|money }}</td>
			<td></td>
		</tr>
		{% endif %}
		<tr>
			<td class="header" colspan="6">Chars</td>
		</tr>
		{% for char in chars %}
		<tr>
			<td class="narrow"><img src="{{ char|avatar }}" /></td>
			<td>{{ char.name }}</td>
			<td>{{ char.realm.name }}</td>
			<td class="narrow">{{ char.level }}</td>
			<td>{{ char.money|money }}</td>
			<td><a href="make_main/guid={{ char.guid }}&realm={{ char.realm_id }}">MakeMain</a></td>
		</tr>
		{% endfor %}
	</tbody>
</table>
{% endblock %}