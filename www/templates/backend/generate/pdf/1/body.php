<hr style="border-top: 3px solid grey;">
<div id="header">
    <div class="row">
        <div class="col15">
            Address:
        </div>
        <div class="col55">
            <?php echo nl2br($quote['address']); ?>
        </div>
        <div class="col15">
            Phone:<br>
            Fax:<br>
            Mobile:<br>
        </div>
        <div class="col15">
            <?php echo $quote['phone']; ?><br>
            <?php echo $quote['fax']; ?><br>
            <?php echo $quote['mobile']; ?><br>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col15">
            Attn:
            <br>
            <br>
        </div>
        <div class="col70">
            <?php echo $quote['attn']; ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col15">
            Quote #:<br>
            Client Job #:<br>
            Project Name:<br>
        </div>
        <div class="col55">
            <?php echo $quote['id']; ?><br>
            <?php echo $quote['client_job_no'] ? $quote['client_job_no'] : 'N/A'; ?><br>
            <?php echo $quote['project_name']; ?><br>
        </div>
        <div class="col15">
            Quote<br>
            Expiration Date:<br>
            PO #:<br>
        </div>
        <div class="col15">
            <br>
            <?php echo $quote['expiration_date']; ?><br>
            <?php echo $quote['po_no'] ? $quote['po_no'] : 'N/A'; ?><br>
        </div>
    </div>
    <div class="row">
        <div class="col15 offset15">
            <b>Renderings</b>
        </div>
    </div>
    <div class="row">
        <table style="width: 100%">
            <thead>
            <tr>
                <th>Service</th>
                <th>Description</th>
                <th>Estimated Qty</th>
                <th>Rate</th>
                <th>Estimated Total</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($quote['services']): ?>
                <?php foreach ($quote['services'] as $service): ?>
                    <tr>
                        <td><?php echo $service['service_name']; ?></td>
                        <td><?php echo $service['description']; ?></td>
                        <td><?php echo number_format($service['qty'], 2); ?> LS</td>
                        <td>$<?php echo $service['rate']; ?></td>
                        <td>$<?php echo number_format($service['total'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3" style="border-bottom: none;"></td>
                <td style="border-bottom: none;"><br>USD Total: </td>
                <td style="border-bottom: none; text-align: right;"><br>$<?php echo $total; ?>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<br><br>

<span style="font-size: 12px;">
    <i>This Price Quotation is made subject to the Terms of Proposal and Terms and Conditions of Service, which are attached hereto and made a part hereof. Based on <?php echo date('Y'); ?>
        VIATechnik Engineering Services Billing Rate Schedule hourly rates and our estimated time to complete this project.  Invoices will be based on actual hours worked, billed
        on a monthly basis. VIATechnik accepts no responsibility and will not be held liable for losses either financial, or consequential, or otherwise from the use or lack of use
        our estimating and engineering services.</i>
</span>
<br><br>
Thank You!<br>
Danielle Dy Buncio, President<br>
VIATechnik, LLC<br><br>
<br>
<div class="row">
    <div class="col50">
        Proposal Accepted By:<br>
        <b><?php echo $quote['company_name']; ?></b><br><br>
        <hr style="margin-bottom: 2px;">
        Name (printed)<br><br>
        <hr style="margin-bottom: 2px;">
        Title<br><br>
        <hr style="margin-bottom: 2px;">
        Signature<br><br>
        <hr style="margin-bottom: 2px;">
        Date
    </div>
    <div class="col50">
        Proposal Accepted By:<br>
        <b>VIATechnik, LLC</b><br><br>
        <hr style="margin-bottom: 2px;">
        Name (printed)<br><br>
        <hr style="margin-bottom: 2px;">
        Title<br><br>
        <hr style="margin-bottom: 2px;">
        Signature<br><br>
        <hr style="margin-bottom: 2px;">
        Date
    </div>
</div>
<pagebreak />
<h3>TERMS OF PROPOSAL</h3>
1. This proposal is valid for 30 days from the date of execution and delivery by VIATechnik to the Client, unless
otherwise noted.<br>
2. VIATechnik will require current plans in an electronic format prior to commencing work. VIATechnik is not
responsible to obtain future revisions. It is the responsibility of the Client to provide such revisions for our use
to accurately perform the above scope.<br>
3. VIATechnik shall rely on the accuracy of the plans and is not responsible for design errors that are laid out and
constructed according to plan documents provided to VIATechnik.<br>
4. VIATechnik requires a minimum of two (2) days notice prior to commencement of Client’s work forces
starting in order to meet and maintain the Client’s schedule.<br>
5. VIATechnik will be prompt in its response to the Client’s request for mobilization throughout the project.
Forty-eight (48) hours notice is required for mobilization.<br>
6. Project Management, Quality Control and Administrative support may be required in addition to drafting and
engineering time to prepare plans, perform calculations, quality control/assurance checks, et cetera.<br>
7. This proposal is based on the hourly rates set forth in 2015 VIATechnik Engineering Service Billing Rate
Schedule and VIATechnik’s estimated time to complete the project. Invoices will be based on actual hours
worked, billed on a monthly basis, unless otherwise noted.<br>
8. This proposal is made subject to the attached Term and Conditions of Service.<br>
9. VIATechnik disclaims any and all liabilities relating to this proposal, the estimated amount submitted, and any
use or non-use thereof by any person, except as set forth in the Terms and Conditions of Service.<br>
10. The Billing Rate schedules for services is valid through December 31, 2015. A revised Billing Rate Schedule will
be issued at that time. VIATechnik reserves the right to revise our Billing Rate Schedule at any time.<br><br>
VIATechnik is committed to maintaining positive client relationships through our work practices and our people.
Furthermore, the depth of our resources allows us to respond quickly to meet the demanding needs of today’s market
place. Combined with our experience we believe VIATechnik brings an advantage that is second to none.<br><br>
We would appreciate the opportunity to work with you on this project and respectfully request your consideration of
our services. If the Scope of Work contained herein meets with your approval, kindly acknowledge your acceptance
by signing the attached proposal form, and returning electronically.<br><br>
If you have any questions please do not hesitate to call our office at your convenience. Thank you for this opportunity.
<pagebreak />

<h3 class="text-center">
    TERMS AND CONDITIONS OF SERVICE
</h3>
<div class="row" style="font-size: 11px;">
        <br><br><u>1. PROPOSAL</u> Description of the services to be rendered by VIATechnik
        (“Services”) is set forth in the price quotation and terms of proposal
        (“Proposal”) attached to these Terms and Conditions of Service (this
        “Agreement”). The Proposal shall remain valid for a period of 60 days from
        execution and delivery by VIATechnik to the Client. “Client” refers to the
        person or the entity identified as the Client on the attached Proposal.
        <br><br><u>2. VIATECHNIK CONTACT PERSON</u> VIATechnik will designate one of its
        employees to serve as the contact person for Client in connection with the
        Services and the Work Product to be provided under this Agreement.
        VIATechnik shall cause such designee to be reasonably and promptly available
        to coordinate with Client so that the objectives of this Agreement can be
        timely carried out to the satisfaction of the parties.
        <br><br><u>3. CONFIDENTIAL INFORMATION</u> If VIATechnik or Client supplies proprietary
        or confidential information to the other party in connection with this
        Agreement that is identified as, or that the other party should have known is,
        confidential, then the other party agrees to (a) protect the confidential
        information in a reasonable manner and (b) use and reproduce confidential
        information only as required to perform its obligations under this Agreement.
        This Section will not apply to information that is publicly known, already
        known to the receiving party, disclosed to a third party without restriction, or
        disclosed pursuant to legal requirement or order. Subject to the foregoing,
        VIATechnik may disclose Client’s confidential information to VIATechnik’s
        employees, contractors and subcontractors in order to perform the Services.
        <br><br><u>4. INVOICE AND PAYMENT PROCEDURES</u> VIATechnik shall submit invoices,
        once a month, at a minimum, to the Client for Services rendered during each
        calendar month. The Client, as the Client or authorized agent for the Client,
        hereby agrees that payment will be made for said Services within thirty (30)
        days from the date of invoice; and, in default of such payment, hereby agrees
        to pay all cost of collection, including reasonable attorney’s fees, regardless of
        whether legal action is initiated. The Client hereby acknowledges that unpaid
        invoices shall accrue interest at 1.8 percent per month after they have been
        outstanding for over thirty (30) days. If an invoice remains unpaid over thirty
        (30) days, VIATechnik may terminate the provision of its Services until such
        payment default is cured. If any payment default fails to be cured for longer
        than 45 days from the date of the invoice, VIATechnik may at its option
        terminate this Agreement, whereupon the terms of Section 11 shall govern.
        <br><br><u>5. CONSTRUCTION SERVICES</u> Construction phase Services are not intended to
        be exhaustive detailed inspections but site observations to become generally
        familiar with and to keep the Client informed about the progress and quality
        of work. The contractor hired for construction (“Contractor”) is solely
        responsible for compliance with the applicable contract documents for
        construction (“Contract Documents”) relating to the work. If, under this
        Agreement, professional services are provided during the construction phase
        of the project, VIATechnik shall not exercise control, shall not be responsible
        for, and shall not be liable for: (a) any means, methods, techniques,
        sequences, or procedures undertaken by Contractor relating to the work; (b)
        for safety precautions and programs undertaken by Contractor in connection
        with the work; (c) compliance by the Contractor with the construction
        schedules and Contract Documents; or (d) Contractor’s failure to comply with
        applicable laws, ordinances, rules or regulations. Under no circumstances will
        VIATechnik have any contractual relationship, employer/employee
        relationship, supervisory relationship or any other relationship with the
        Contractor, any construction manager retained by the Client or the
        Contractor, any of their respective subcontractors, material suppliers or other
        consultants unless VIATechnik and the Client expressly agree otherwise in
        writing.
        <br><br><u>6. SCOPE OF WORK</u> The estimation of quantity and total price provided by
        VIATechnik in the Proposal are good faith estimates based on the plans,
        drawings and other information provided by the Client as of the date of the
        Proposal. There is no guarantee that the Services will be completed within
        such quantity or price. In the event of any change in the (a) plans and designs,
        and other Client’s requirements related to the work, (b) any applicable law
        and regulations effecting the Services and (c) any other reason not
        contemplated on the date of the Proposal, additional work will be included as
        Services, and such additional work shall be paid for
        by the Client. VIATechnik agrees to provide to Client a written notice of any work modifications
        requiring more than [20%] in variation from the fees quoted in the Proposal,
        and Client will be deemed to have accepted such revised Proposal and
        estimated fees unless a notice of objection is delivered to VIATechnik within
        five business days of receipt of such notice from VIATechnik.
        <br><br><u>7. WORK PRODUCT</u> Upon payment of all amounts due to VIATechnik in
        connection with this Agreement, Client shall own all right, title, and interest in
        the Work Product. The foregoing notwithstanding, Work Product shall not
        include pre-existing materials, software, or applications that are owned by
        VIATechnik or licensed to VIATechnik by third parties and that VIATechnik
        uses in the performance of the Services, derivative works deriving from or
        based on any of the foregoing, or any ideas, concepts, methods, techniques,
        processes, procedures or know-how embodied by or incorporated into the
        deliverables that VIATechnik provides to you (collectively, “Tools”). All right,
        title, and interest in and to the Tools shall remain VIATechnik’s (or the
        applicable third party’s) exclusive property. If Client has any issue or problem
        with the Work Product or Services provided by VIATechnik or its contractors
        or employees under this Agreement, Client must provide written notice of
        such issue or problem within 30 days of the delivery of such Work Product or
        Services. Client represents, warrants and covenants that Client solely
        responsible for reviewing all Work Product and shall be responsible to any
        third party beneficiaries of the Work Product or other persons or entities that
        may rely on the Work Product.
        <br><br><u>8. MISCELLANEOUS EXPENSES</u> The Client shall pay the costs of all fees,
        permits, bond premiums, scanning and reproductions, travel, and all other
        charges related to the work and the Services, other than those charges which
        VIATechnik specifically agrees to pay under this Agreement.
        <br><br><u>9. REUSE OF PROJECT DELIVERABLES</u> Reuse of any documents or other
        deliverables, including electronic media, pertaining to the Services by the
        Client for any purpose other than that for which such documents or
        deliverables were originally prepared, or alternation of such documents or
        deliverable without written verification or adaption by VIATechnik for the
        specific purpose intended, shall be at the Client’s sole risk.
        <br><br><u>10. RELIANCE ON THE CLIENT DOCUMENTS.</u> VIATechnik shall rely on the
        accuracy, completeness and adequacy of all plans, designs, drawings,
        instructions and other documents and information provided by the Client and
        any of its contractors, representatives and agents (“Client Documents”).
        Client agrees to indemnify, defend, and hold harmless VIATechnik and any of
        its Clients, directors, officers, employees and agents (“VIATechnik Party”)
        from and against any loss, liability and damages sustained by them resulting
        from any of VIATechnik Party’s use or reliance on such Client Documents.
            <br><br><u>11. SHOP DRAWINGS</u> VIATechnik may review plans, designs, drawings and
        other documents and information (“Third Party Documents”) provided by
        other contractors and agents of the Client from time to time, for the sole
        purposes of providing the Services of VIATechnik to the Client. VIATechnik is
        not responsible for reviewing or confirming the accuracy, completeness or
        adequacy of such Third Party Documents, or for substantiating and/or
        coordinating instructions for installation or for ensuring performance of any
        equipment or systems, all of which remain the responsibility of the relevant
        third parties. VIATechnik’s review shall not constitute approval or acceptance
        of any component of work outside of the scope of Services of VIATechnik, and
        its approval any specific item within its scope of Services shall not indicate
        approval of an assembly of which the item is a component.
        <br><br><u>12. OPINIONS OF CONSTRUCTION COST</u> Any opinion of construction costs
        prepared by VIATechnik is supplied for the general guidance of the Client only.
        Since VIATechnik has no control over competitive bidding or fluctuating
        market conditions, VIATechnik cannot guarantee the accuracy of such
        opinions.
        <br><br><u>13. INDEMNITY</u> To the fullest extent permitted by law, each party
        (“Indemnifying Party”) shall indemnify and save harmless the other party, its
        Clients, directors, officers, employees and agents (“Indemnified Party”) from
        and against loss, liability, and damages sustained by the Indemnified Party as
        a result of Indemnifying Party’s breach of this Agreement or the negligence of the Indemnifying Party, its employees or agents. The Indemnifying Party’s
        liability to indemnify hereunder shall be reduced proportionately to the
        extent that any acts or omissions of the Indemnified Party contributed to such
        claim, liability or loss.
        <br><br><u>14. DISCLAIMERS OF ALL WARRANTIES</u> VIATechnik hereby disclaims all
        warranties, whether express or implied, with respect to the services and the
        word product, including by not limited to, any implied warranty of
        merchantability, fitness for particular purpose and/or title and, except as set
        forth in these terms and conditions, the services and the work product are
        provided “as is”.
        15.LIMITATIONS OF LIABILITY: NEITHER PARTY WILL BE LIABLE (WHETHER IN
        CONTRACT, WARRANTY, TORT (INCLUDING NEGLIGENCE), OR OTHER
        THEORY), TO THE OTHER PARTY OR ANY OTHER PERSON OR ENTITY FOR ANY
        INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, PUNITIVE OR EXEMPLARY
        DAMAGES (INCLUDING DAMAGES FOR LOSS OF PROFIT) ARISING OUT OF THIS
        AGREEMENT. No employee of VIATechnik shall have individual liability to
        Client. Client agrees that, to the fullest extent permitted by law,
        VIATechnik’s total liability to Client for any and all injuries, claims, losses,
        expenses or damages whatsoever arising out of or in any way related to the
        Services or this Agreement from any causes including, but not limited to,
        VIATechnik’s negligence, error, omissions, strict liability, or breach of contract
        shall not exceed the total compensation received by VIATechnik under this
        Agreement. If the Client desires a limit of liability greater than provided
        above, the Client and VIATechnik shall include in the Agreement the amount
        of such limit and the additional compensation to be paid to VIATechnik for
        assumption of such risk.
        <br><br><u>16. TERMINATION.</u> This Agreement may be terminated (a) by mutual
        agreement by the parties (b) by delivery of a termination notice in case either
        party is in breach and fails to cure such breach within ten days of a written
        notice thereof (c) automatically without notice in case either party voluntarily
        or involuntarily files for bankruptcy or liquidation. Upon termination of this
        Agreement for any reason, the Client shall pay VIATechnik all fees for the
        Services carried out up to and including the date of termination together with
        payment of any costs and expenses incurred VIATechnik to that date.
        <br><br><u>17. PREVAILING PARTY LITIGATION COSTS</u> In the event any actions are
        brought to enforce this Agreement, the prevailing party shall be entitled to
        collect its litigation costs from the other party. Any litigation shall be governed
        by the laws of the state of Illinois.
        <br><br><u>18. NON-SOLICITATION</u> During the term of this Agreement and for a period
        of 6 months after the Termination Date, Client shall not, directly or indirectly,
        without VIATechnik’s prior written consent, recruit, hire or contract with any
        current or former employee or contractor of VIATechnik, or any of
        VIATechnik’s affiliates, or otherwise attempt to solicit or induce any such
        individuals to leave the employment of or terminate his/her relationship with
        VIATechnik or VIATechnik’s affiliates.
        <br><br><u>19. AUTHORITY</u> The persons signing this Agreement warrant that they have
        the authority to sign as, or on behalf of, the party for whom they are signing.
        <br><br><u>20. STATUTE OF LIMITATIONS</u> To the fullest extent permitted by law, parties
        agree that, except for claims for indemnification, the time period for bringing
        claims regarding VIATechnik’s performance under this Agreement shall expire
        one year after the completion of Services.
        21. ENTIRE AGREEMENT; AMENDMENTS. This Agreement constitutes the
        entire Agreement between the parties and contains all of the agreements
        between the parties with respect to the subject matter hereof; this
        Agreement supersedes any and all other agreements, either oral or in writing,
        between the parties hereto with respect to the subject matter hereof. No
        change or modification of this Agreement shall be valid unless the same is in
        writing and signed by the parties. No waiver of any provision of this
        Agreement shall be valid unless in writing and signed by the person or party to
        be charged
    </div>
