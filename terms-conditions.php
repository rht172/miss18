<!DOCTYPE html>
<html lang="en">

<?php
session_start();
ob_start();
// include 'includes/validateSession.php';
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';
?>


<?php
include 'includes/title.php';
?>


<!-- Body-->

<body class="handheld-toolbar-enabled">
  <!-- Google Tag Manager (noscript)-->
  <noscript>
    <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0"
      style="display: none; visibility: hidden;"></iframe>
  </noscript>

  <!-- Sign in / sign up modal-->
  <?php
  include 'sign-up-form.php';
  ?>

  <main class="page-wrapper">

    <!-- Navbar 3 Level (Light)-->
    <?php
    include 'includes/header.php';
    ?>


    <!-- Page Title (Light)-->
    <div class="bg-secondary py-4">
      <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
              <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
              <!-- <li class="breadcrumb-item text-nowrap"><a href="help-topics.html">Help center</a>
              </li> -->
              <li class="breadcrumb-item text-nowrap active" aria-current="page">Terms &amp; Conditions</li>
            </ol>
          </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
          <h1 class="h3 mb-0">TERMS &amp; CONDITIONS</h1>
        </div>
      </div>
    </div>
    <div class="container py-5 mt-md-2 mb-2">
      <div class="row">

        <div class="col-lg-12">
          <!-- <h2 class="h4 pb-3">Available payment methods when checkout</h2> -->
          <p><b>GENERAL</b></p>

          <p class="fs-md">This Website (&quot;www.zoygirl.com”) is owned and operated by Zoycare Hygiene Private
            Limited.
            (Hereinafter referred to as “Owner” or “Company”) a company incorporated under the
            Companies Act, 2013 of India is the sole owner, operator, author and publisher of the Website.</p>

          <p><b>ACCEPTANCE OF TERMS AND CONDITIONS</b></p>

          <ul>

            <li class="fs-md">These Terms of Use (hereinafter referred to as &quot;Terms and Conditions&quot; or
              &quot;T&amp;C&quot; or &quot;Terms&quot; or
              &quot;Agreement&quot;) along with any other Policy or Statement or Information that may be placed on this
              website (hereinafter referred to as “Zoygirl.com” or “Website” or “We” or “Us”), as modified or
              amended from time to time, are a binding contract between the Company and You (hereinafter
              referred to as &quot;You&quot; or &quot;End User&quot; or &quot;Your&quot; or &quot;Buyer&quot; or
              &quot;Customer&quot;).</li>

            <li class="fs-md">If you visit, use, or shop at the site or any future site operated by the company, you
              accept
              these
              Terms and Conditions. In addition, when you use any current or future services of the company
              or visit or purchase from any business affiliated with the company or third-party vendors,
              whether or not included in the site, you also will be subject to the guidelines and conditions
              applicable to such service or merchant. If these conditions are inconsistent with such guidelines
              and conditions, such guidelines and conditions will control.</li>

            <li class="fs-md">If you do not want to be bound by the terms, you must not subscribe to or use our
              services.</li>

          </ul>

          <p><b>MODIFICATION</b></p>

          <p class="fs-md">Zoygirl.com reserves the right to change, modify, adjust, vary, amend or alter all or any
            of
            its
            Terms of Use at any time and at its sole discretion. All such changes, modifications,
            adjustments, amendments and alterations shall be duly notified by Zoygirl.com. However, it is
            the responsibility of the User to keep himself/herself updated regarding such modifications.
            Zoygirl.com shall in no case be held liable in respect of such modifications. The User agrees to
            abide by all applicable guidelines, policies, rules, terms and conditions for availing the Services
            on Zoygirl.com, which may change from time to time.</p>

          <p><b>PROHIBITIONS</b></p>

          <ul>
            <li class="fs-md">Zoygirl.com grants you a limited license to access and make personal use of the website
              and services.</li> <br>

            <p>The following actions will be considered as misuse of the website, and are thus prohibited:</p>

            <li class="fs-md">You are not allowed to reproduce, modify, distribute, display any portion, publish any
              content or make any commercial use of any of the information provided in this website.</li>

            <li class="fs-md">You shall not distribute in any form, any information, or other material that violates,
              infringes the copyrights, patents, trademarks, trade secrets, logo or other proprietary rights of
              Zoygirl.com.</li>

            <li class="fs-md">You are not allowed to republish, archive or retain any content on the internet, intranet,
              extranet, database, archive or compilation. You are not allowed to use any content for commercial use.
            </li>

            <li class="fs-md">You agree not to decompile, reverse engineer or disassemble any software or other products
              or processes accessible through the website, and not to insert any code or product or manipulate the
              content in any way that affects the user&#39;s experience.</li>

            <li class="fs-md">You are not allowed to use the website in any manner that is illegal or impairs the
              operation of the website or its availability or usage by others.</li>

            <li class="fs-md">You further agree not to use any data mining, bugs, viruses, worms, trap doors, web
              crawlers, robots, cancel bots, spiders, Trojan horses, other harmful code of properties or any data
              gathering or extraction method in connection with your use of the website.</li>

            <li class="fs-md">You are not allowed to make any use of the website for the benefit of another business.
            </li>

            <li class="fs-md">You are not allowed to post unsolicited promotional or advertising content.</li>

            <li class="fs-md">We hereby hold no liability to any sort of damage or harm caused to your software, data or
              computer device by downloading content from this website.</li>

          </ul>

          <p><b>ELIGIBILITY</b></p>

          <ul>

            <li class="fs-md">Use of this website is available only to persons who can form legally binding contracts
              under Indian Contract Act, 1872. Persons who are &quot;incompetent to contract&quot; within the meaning of
              the Indian Contract Act, 1872 including minors, un-discharged insolvents etc. are not eligible to use this
              Website.</li>

            <li class="fs-md">The Service is not available to minors under the age of 18 or to any users suspended or
              removed from the system by Zoygirl.com for any reason. If you are a minor i.e. under the age of 18 years,
              you shall not purchase any items on the Website. As a minor if you wish to purchase an item on the
              Website, such a purchase may be made by your legal guardian or parents.</li>

            <li class="fs-md">Users may not have more than one account. Maintaining more than one account by a user
              shall
              amount to fraudulent act on part of the user and attract actions against such users. Additionally,
              users are prohibited from selling, trading, or otherwise transferring your Zoygirl.com account to
              another party. If you do not qualify, you may not use the Service or the Site.</li>

            <li class="fs-md">The Company owns no responsibility in any manner over any dispute arising out of
              transactions
              by any third party using your account/e-mail provided by you to the Company or payments
              made by your credit/debit card by any third party.</li>

            <li class="fs-md">In consideration of your use of the Site, you represent that you are of legal age to form
              a
              binding
              contract and are not a person barred from receiving services under the laws as applicable in
              India. You also agree to provide true, accurate, current, and complete information about yourself
              as prompted by the Site&#39;s registration form. If you provide any information that is untrue,
              inaccurate, not current or incomplete (or becomes untrue, inaccurate, not current or
              incomplete), or Zoygirl.com has reasonable grounds to suspect that such information is untrue,inaccurate,
              not current or incomplete, Zoygirl.com has the right to suspend or terminate your
              account and refuse any and all current or future use of the Site (or any portion thereof). If you
              use the Site, you are responsible for maintaining the confidentiality of your account and
              password including cases when it is being used by any of your family members, friends or
              relatives, whether a minor or an adult. You further agree to accept responsibility for all
              transactions made from your account and any dispute arising out of any misuse of your account,
              whether by any family member, friend, relative, any third party or otherwise shall not be
              entertained by the Company. Because of this, we strongly recommend that you exit from your
              account at the end of each session. You agree to notify Zoygirl.com immediately of any
              unauthorized use of your account or any other breach of security. Zoygirl.com reserves the right
              to refuse service, terminate accounts, or remove or edit content in its sole discretion.</li>

            <li class="fs-md">If you are a business entity, you represent that you are duly authorized by the business
              entity to accept these terms and conditions and you have the authority to bind that business entity to
              these terms and conditions.</li>

          </ul>

          <p><b>PRODUCT INFORMATION, PRICING AND PROMOTIONAL DISCOUNTS</b></p>

          <ul>

            <li class="fs-md">The price of all products, delivery charges and any other applicable charges are displayed
              in
              Indian Rupees (INR). All prices are current at time of display, but these prices are subject to
              change without notice.</li>

            <li class="fs-md">Zoygirl.com has made every effort to display as accurately as possible the colors of our
              products that appear on the website. Further, Zoygirl.com has ensured that the measurements,
              information and description for products furnished on the site are best calculated and stated to
              accuracy and true to its dimensions. However, due to the inherent characteristics of certain
              materials, actual measurements of individual items might vary slightly.</li>

            <li class="fs-md">We offer you promotional discount codes that are applicable on the purchases made on this
              website. These discount codes can be applicable on all or certain specified products. Please
              note that use of only one discount code is permissible per order. You cannot use a discount
              code if an order is already placed.</li>

            <li class="fs-md">As a condition of purchase, the Site requires your permission to send you administrative
              and
              promotional emails/calls. We will send you information regarding your account activity and
              purchases, as well as updates about our products and promotional offers. We shall have no
              responsibility in any manner whatsoever regarding any promotional emails/calls/SMS/Whatsapp
              sent to you. The offers made in those promotional emails/calls/SMS/Whatsapp shall be subject
              to change at the sole discretion of the Company and the Company owes no responsibility to
              provide you any information regarding such change.</li>

          </ul>

          <p><b>TAXES</b></p>

          <p class="fs-md">You shall be responsible for payment of all fees/costs/charges associated with the purchase
            of
            products from us and you agree to bear any and all applicable taxes including but not limited to
            GST, service tax, duties and cases etc.</p>



          <p><b>ERRORS, INACCURACIES, AND OMISSIONS</b></p>

          <ul>

            <li class="fs-md">There may be information on our site that contains typographical errors, inaccuracies, or
              omissions that may relate to product descriptions, pricing, promotions, offers, transit times and
              availability. We reserve the right to correct any errors, inaccuracies or omissions and to change
              or update information without prior notice (including after you have submitted your order).</li>

            <li class="fs-md">In the event a product is listed at an incorrect price or with incorrect information due
              to a
              typographical error or error in pricing or product information, Zoygirl.com shall have the right to
              refuse or cancel any orders placed for the product listed at the incorrect price whether or not the
              order has been confirmed and your credit card charged. If your credit card has already been
              charged for the purchase and your order is cancelled, Zoygirl.com shall immediately issue credit
              in the amount of the charge.</li>

          </ul>


          <p><b>PAYMENTS &amp; ACCEPTANCE</b></p>

          <ul>

            <li class="fs-md">Payment must be made at the time the products are ordered. When you place an order you
              will
              be automatically redirected to the secure Razor pay website for you to complete payment.
              Zoygirl.com does not keep a record of your credit/debit card details.</li>

            <li class="fs-md">Zoygirl.com retains the right to accept or deny any offer made. This may be due to the
              availability of any product, or for any other reason that may affect our ability to supply the
              products ordered. No contract is formed until we communicate acceptance of your order.</li>

            <li class="fs-md">The electronic contract shall have the same legal force and effect as a written contract
              signed by you.</li>

          </ul>

          <p><b>INTELLECTUAL PROPERTY SOFTWARE AND CONTENT</b></p>

          <ul>
            <li class="fs-md">Zoygirl.com owns all the content available on this website, including, the text, graphics
              and
              copyright works. Zoygirl.com is the exclusive owner of all rights in the compilation, design and
              layout of this website.</li>

            <li class="fs-md">You may not copy any content from this website without the prior written consent from
              Zoygirl.com. Modification, misuse, translation or creation of derivative work on the basis of
              website content is highly prohibited.</li>

            <li class="fs-md">Zoygirl.com grants you a limited license to access and make personal use of the Site and
              the
              Service. This license does not include any downloading or copying of account information for
              the benefit of another vendor or any other third party; caching, unauthorized hypertext links to
              the Site and the framing of any Content available through the Site uploading, posting, or
              transmitting any content that you do not have a right to make available (such as the intellectual
              property of another party); uploading, posting, or transmitting any material that contains
              software viruses or any other computer code, files or programs designed to interrupt, destroy or
              limit the functionality of any computer software or hardware or telecommunications equipment;
              any action that imposes or may impose (in Zoygirl.com sole discretion) an unreasonable or
              disproportionately large load on Zoygirl.com infrastructure; or any use of data mining, robots, or
              similar data gathering and extraction tools. You may not bypass any measures used by
              Zoygirl.com to prevent or restrict access to the Site. Any unauthorized use by you shall
              terminate the permission or license granted to you by Zoygirl.com.</li>

          </ul>


          <p><b>LINKS TO OTHER SITES</b></p>

          <p class="fs-md">This website may contain links to third party websites. Any outside links are provided only
            as a
            convenience. Your use of outside links is at your sole risk. Links from the website do not
            constitute Zoygirl.com endorsement of any third party, its website, or its goods or services.
            Zoygirl.com is not responsible for any outside sites, services or other material linked to or from
            the website and disclaims all liability for any injury you may experience by using such materials.</p>


          <p><b>ELECTRONIC EVIDENCE</b></p>

          <p class="fs-md">You agree that in the event of a dispute between You and Zoycare or You and another user,
            that Zoycare’s electronic records of your transactions, the Zoycare’s User Agreement, the
            Zoycare’s Privacy Policy, any identity verification information provided in a paper format and
            subsequently scanned or otherwise converted into an electronic format, and any other
            information stored or created electronically shall be admissible in a court of law or in relation to
            a law enforcement or regulatory investigation or prosecution.</p>


          <p><b>GUARANTEES AND WARRANTIES</b></p>

          <ul>

            <li class="fs-md">To the extent permitted by law, Zoygirl.com excludes all warranties, representations and
              guarantees (whether express, implied or statutory), and we will not be liable for any damages,
              losses or expenses, or indirect losses or consequential damages of any kind, suffered or
              incurred by you in connection with your access to or use of this website or the content on or
              accessed through it.</li>

            <li class="fs-md">This disclaimer of liability also applies to any damages or injury caused by any failure
              of
              performance, error, omission, interruption, deletion, defect, delay in operation or transmission,
              computer virus, communication line failure, theft or destruction or unauthorized access to,
              alteration of, or use of record, whether for breach of contract, tortuous behavior, negligence, or
              under any other cause of action.</li>

          </ul>

          <p><b>ACCOUNT INFORMATION</b></p>

          <ul>

            <li class="fs-md">Zoygirl.com may assign you a password and account for identification, to enable you to
              access
              and use certain portions of this website. Each time you use a password or identification, you will
              be deemed to be authorized to access and use the website in a manner consistent with the
              terms and conditions of this agreement.</li>

            <li class="fs-md">Zoygirl.com has no obligation to investigate the authorization or source of any such
              access
              or
              use of the website. You are solely responsible for protecting the security and confidentiality of
              the password and identification assigned and for restricting access to your computer, and you
              agree to accept responsibility for all activities that occur under your account or password.</li>

            <li class="fs-md">You shall immediately notify Zoygirl.com of any unauthorized use of your password or
              identification or any other breach or threatened breach of this website&#39;s security.</li>

            <li class="fs-md">You will be solely responsible for all access to and use of this site by anyone using this
              password and identification whether or not such access to and use of this site (including all
              obligations, communications and transmissions) is actually authorized by you.</li>

          </ul>

          <p><b>FRAUDS</b></p>

          <p class="fs-md">Zoygirl.com reserves the right to recover the cost of goods, collection charges and other
            expenses that may occur from persons for using the Site fraudulently. Zoygirl.com reserves the
            right to initiate legal proceedings against such persons for fraudulent use of the Site and any
            other unlawful acts or omissions in breach of these terms and conditions.</p>

          <p><b>REDEEM VOUCHERS AND PROMOTIONAL CODES</b></p>

          <p class="fs-md">There are limited period vouchers and promotional codes which can be issued or cancelled by
            Zoygirl.com as part of any campaign or scheme. The terms for these campaigns will be decided
            by Zoygirl.com at the time of the campaign and these should be acceptable to you.</p>

          <p><b>DISCLAIMER</b></p>

          <p class="fs-md">You acknowledge and undertake that you are accessing the services on the site and transacting
            at your own risk and are using your best and prudent judgment before entering into any
            transactions through Zoygirl.com. If you are dissatisfied with the Site, any Contents, or any of
            these Terms and conditions, we would like to hear from you. However, your only legal remedy is
            to stop using the website. Zoygirl.com does not warrant your use of the Site.</p>

          <p><b>INDEMNIFICATION</b></p>

          <p class="fs-md">You shall indemnify and hold harmless Zoygirl.com, its owner, licensee, affiliates,
            subsidiaries,
            group companies (if any) and their respective officers, directors, agents, and employees, from
            any claim or demand, or actions including reasonable attorneys&#39; fees, made by any third party
            or penalty imposed due to or arising out of Your breach of this Terms of Use, privacy Policy and
            other Policies, or Your violation of any law, rules or regulations or the rights (including
            infringement of intellectual property rights) of a third party.</p>

          <p><b>GOVERNING LAW, JURISDICTION AND DISPUTE RESOLUTION</b></p>

          <ul>

            <li class="fs-md">Zoygirl.com controls and operates this website from its Registered Office in Tiruppur.
              These
              Terms of Use (and any further rules, polices, or guidelines incorporated by reference) shall be
              governed and construed in accordance with the laws of India.</li>

            <li class="fs-md">Any dispute arising under or relating to the terms, contents, your use of the website, or
              products
              or services purchased using the website or with Zoygirl.com shall solely and to the exclusion of
              all other courts be subject to the jurisdiction of the appropriate Courts situated in Tiruppur, India
              alone. By using the website, you consent to the jurisdiction and venue of Tiruppur courts with
              respect to any such dispute.</li>

            <li class="fs-md">Disputes between you and Zoycare regarding our Services may be reported to Customer
              Support online through the Zoycare Website at any time.</li>

          </ul>


          <p><b>GRIEVANCE REDRESSAL</b></p>

          <p class="fs-md">Any complaint or concern with regard to the Services, access, usage, content, comment or
            breach of the Terms of Use shall be addressed to the designated Grievance Officer of
            Zoygirl.com. The complaint shall be registered through a phone call on the number provided below or by
            sending an email to the respective email ID as provided below. It shall be the
            endeavour of Zoygirl.com to satisfactorily resolve and address the grievances at the earliest.</p>

          <p><b>Phone number: - +91 9843029090</b></p>

          <p><b>Email - support@cloudzoo.in.in</b></p>

          <p><b>TERMINATION</b></p>

          <p class="fs-md">Zoygirl.com reserves the right to terminate the User’s access to Zoygirl.com without any
            cause
            or notice. This may result in the forfeiture and destruction of all information associated with the
            User. In such an event, the Terms of Use shall come to an end. However, the Indemnification,
            Disclaimer, Governing Law/Jurisdiction and Dispute Resolution and Privacy Policy shall survive
            such termination.</p>


          <p><b>ENTIRE AGREEMENT</b></p>

          <ul>
            <li class="fs-md">These Terms of Use constitutes the complete agreement and sets forth the entire
              understanding of you and the Zoygirl.com as to the subject matter of this Agreement. If any
              provision of this Agreement is found by any court of competent jurisdiction to be invalid or
              unenforceable, the invalidity of such provision shall not affect the other provisions of this
              Agreement, and all provisions not affected by such invalidity shall remain in full force and effect.
              The headings contained in this Agreement are for convenience of reference only and shall not
              affect the meaning and interpretation of this Agreement.</li>

            <li class="fs-md">By accepting these Terms of Use, the User agrees to have fully read and understood all the
              terms and conditions set out hereinabove.</li>

          </ul>

          <p class="fs-md">Note: The Agreement is published in accordance with the provisions of Section 3 &amp; Section
            3-A
            of the Information Technology Act, 2000 that require an electronic record to be authenticated
            with an electronic signature and also in accordance with Rule 3(1) of the Information
            Technology (Intermediary Guidelines) Rules, 2011 that require publishing the rules and
            regulations, privacy policy and the user agreement for access-or-usage of the intermediary’s
            computer resource by any person.</p>

        </div>


      </div>
    </div>
    </div>
  </main>

  <!-- Footer-->
  <?php include 'includes/footer.php' ?>

</body>


</html>