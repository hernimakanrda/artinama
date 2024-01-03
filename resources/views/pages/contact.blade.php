<div>
    <div class="w-full px-6 my-auto bg-white shadow-xl shadow-slate-700/10 ring-1 ring-gray-900/5 md:max-w-3xl md:mx-auto lg:pt-6 lg:pb-28">
        <article class="format max-w-full">
            <h1>Contact</h1>

            <p>Have any question, comment, suggestion or news tip to pass along to {{ config('app.name') }}?</p>
            <p>We are open to discuss all of the possibilities with you. This page offering the right way to sent any comments to&nbsp; admin related to your feedback, news coverage and other issues related to this site.</p>
            <p>We are happy to hear information from you please write a subject format:</p>
            <ul>
                <li><strong>Claim Picture</strong>&nbsp;[picture name] [url to real picture] : if you are the real owner to claim your picture and need back links.</li>
                <li><strong>Submit Wallpapers</strong>&nbsp;[wallpaper name] : if you wanna submit your or your wallpaper design to us.</li>
                <li><strong>Advertise</strong>&nbsp;: if you interested to advertising on our site.</li>
                <li><strong>Support</strong> : if you need our support.</li>
            </ul>
            <p>And send all your inquiries to our official mail at {{ 'contact@' . parse_url(route('home_page'), PHP_URL_HOST) }}</p>
            <p>Don’t hesitate to contact us according your concerns and don’t worry, all of your comment are welcome. :) </p>
            <p>Thank you.</p>
        </article>
    </div>
</div>
