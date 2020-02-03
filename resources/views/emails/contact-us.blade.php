@extends('emails.layouts.base')
@section('content')
<table width="100%" cellpadding="0" cellspacing="0"
  style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
  <tr
    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
    <td class="content-block"
      style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
      valign="top">
      <b>First Name:</b> {{ $dataForm['first_name'] }}
    </td>
    <td class="content-block"
      style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
      valign="top">
      <b>Last Name:</b> {{ $dataForm['lastt_name'] }}
    </td>
  </tr>
  <tr
    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
    <td class="content-block"
      style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
      valign="top">
      <b>Email:</b> {{ $dataForm['email'] }}
    </td>
    <td class="content-block"
      style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
      valign="top">
      <b>Phone:</b> {{ $dataForm['phone'] }}
    </td>
  </tr>
  <tr
    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
    <td class="content-block"
      style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
      valign="top">
      <b>Subject, select a topic:</b> {{ $dataForm['subject'] }}
    </td>
    <td class="content-block"
      style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
      valign="top">
      <b>House Plan Number:</b> {{ $dataForm['plan_number'] }}
    </td>
  </tr>
  <tr
    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
    <td colspan="2" class="content-block"
      style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
      valign="top">
      {{ $dataForm['question'] }}
    </td>
  </tr>
  <tr
    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
    <td class="content-block"
      style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
      valign="top">
      <b>Do you have land?</b> {{ $dataForm['land'] }}
    </td>
    <td class="content-block"
      style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
      valign="top">
      <b>When are you planning to build?</b> {{ $dataForm['when'] }}
    </td>
  </tr>
  <tr
    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
    <td class="content-block"
      style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
      valign="top">
      <b>Do you have a builder?</b> {{ $dataForm['builder'] }}
    </td>
    <td class="content-block"
      style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
      valign="top">
      <b>How did you hear about us?</b> {{ $dataForm['how'] }}
    </td>
  </tr>
</table>
@endsection