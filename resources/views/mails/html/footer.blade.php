<tr>
    <td>
        <table class="footer" align="center" width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td class="content-cell" align="center" style="width:570px; margin: 10px auto;">
                    <p style="color: #8c8c8c; font-size: 10px; text-align: center;">
                        This email was sent on behalf of KnowMore (<a href="https://knowmoreplatform.com">www.knowmoreplatform.com</a>). <br>
                        NoMore ApS, Toldbodgade 95A, Copenhagen K 1253, Denmark.
                    </p>
                    {{ Illuminate\Mail\Markdown::parse($slot) }}
                </td>
            </tr>
        </table>
    </td>
</tr>