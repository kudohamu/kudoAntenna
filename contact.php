<?php
function contact() {
	$formStr = '';
	$formStr .= '<div id="contents">
<p>下記フォームに必要事項を入力後、確認ボタンを押してください。</p>
<form method="post" action="mail.php">
<table cellpadding="5">
  <tr>
    <td class="l_Cel">■ご用件</td>
    <td>
      <select name="ご用件">
      <option value="">選択してください</option>
      <option value="意見・要望">意見・要望</option>
      <option value="相互リンク依頼">相互リンク依頼</option>
      <option value="巡回リンクについて">巡回リンクについて</option>
      <option value="その他">その他</option>
      </select></td>
  </tr>

<tr>
<td class="l_Cel">■お名前</td>
<td><input size="20" type="text" name="名前" />※必須</td>
</tr>

<tr>
  <td>■Mail（半角）</td>
  <td><input size="30" type="text" name="Email" />
    ※必須</td>

</tr>

<tr>
<td colspan="2">■お問い合わせ内容<br />
<textarea name="お問い合わせ内容" cols="50" rows="5"></textarea></td>
</tr>
</table>
<p>
<input type="submit" value="　確認　" />
<input type="reset" value="リセット" />
</p>
</form>

<p></p>
</div>
';

return $formStr;
}
?>
