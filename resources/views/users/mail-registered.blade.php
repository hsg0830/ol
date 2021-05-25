<table>
  <tr>
    <th>이름</th>
    <td>{{ $user->name }}</td>
  </tr>
  <tr>
    <th>소속</th>
    <td>{{ $user->school->name }}</td>
  </tr>
</table>

<p style="margin-top: 1rem;">※현재 총회원수: {{ $usersMount }}</p>
