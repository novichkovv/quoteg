<hr style="border-top: 3px solid grey;">
<div id="header">
    <div class="row">
        <div class="col60">
            <div class="row">
                <div class="col15">
                    Address:
                </div>
                <div class="col55">
                    <?php echo $quote['address']; ?><br>
                    <?php echo $quote['state']; ?>, <?php echo $quote['city']; ?>
                </div>
            </div>
        </div>
        <div class="col30">
            <div class="row">
                <div class="col50">
                    Phone:
                </div>
                <div class="col50">
                    <?php echo $quote['phone']; ?>
                </div>
            </div>
            <div class="row">
                <div class="col50">
                    Fax:
                </div>
                <div class="col50">
                    <?php echo $quote['fax']; ?><br>
                </div>
            </div>
            <div class="row">
                <div class="col50">
                    Mobile:
                </div>
                <div class="col50">
                    <?php echo $quote['mobile']; ?>
                </div>
            </div>
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
        <div class="col60">
            <div class="row">
                <div class="col30">
                    Quote #:
                </div>
                <div class="col70">
                    <?php echo $quote['id']; ?>
                </div>
            </div>
            <div class="row">
                <div class="col30">
                    Client Job #:
                </div>
                <div class="col70">
                    <?php echo $quote['client_job_no'] ? $quote['client_job_no'] : 'N/A'; ?>
                </div>
            </div>
            <div class="row">
                <div class="col30">
                    Project Name:
                </div>
                <div class="col70">
                    <?php echo $quote['project_name']; ?>
                </div>
            </div>
        </div>
        <div class="col30">
            <div class="row">
                <div class="col50">
                    Quote
                    Expiration Date:
                </div>
                <div class="col50">
                    <br>
                    <?php echo $quote['expiration_date']; ?>
                </div>
            </div>
            <div class="row">
                <div class="col50">
                    PO #:
                </div>
                <div class="col50">
                    <?php echo $quote['po_no'] ? $quote['po_no'] : 'N/A'; ?><br>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col60 offset15">
            <b><?php echo $quote['project_type']; ?></b>
        </div>
    </div>
    <div class="row">
        <table style="width: 100%" class="table">
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
                        <td><?php echo number_format($service['qty'], 2); ?> <?php echo $service['unit']; ?></td>
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
                <td style="border-bottom: none; text-align: right;"><br>$<?php echo number_format($total, 2); ?>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<br><br>

<span style="font-size: 12px;">
    <i>This Price Quotation is made subject to the Terms of Proposal and Terms and Conditions of Service, which are attached hereto and made a part hereof. Based on <?php echo date('Y'); ?>
        VIATechnik Engineering Services Billing Rate Schedule hourly rates and our estimated time to complete this project.  
        <?php if ($quote['hourly_basis']): ?>
            Invoices will be based on actual hours worked, billed
            on a monthly basis.
        <?php endif; ?>
        VIATechnik accepts no responsibility and will not be held liable for losses either financial, or consequential, or otherwise from the use or lack of use of
        our estimating and engineering services.</i>
</span>
<br><br>
<div style="page-break-inside: avoid;">
    Thank You!<br>
    Danielle Dy Buncio, President<br>
    VIATechnik, LLC<br><br>
    <br>
</div>
<table style="width: 100%; page-break-inside: avoid;">
    <tr>
        <td style="width: 49%;">Proposal Accepted By:</td>
        <td style="width: 49%;">Proposal Accepted By:</td>
    </tr>
    <tr>
        <td style="width: 49%;"><b><?php echo $quote['company_name']; ?></b><br><br><br></td>
        <td style="width: 49%;"><b>VIATechnik, LLC</b><br><br><br></td>
    </tr>
    <tr>
        <td><hr style="margin-bottom: 2px;">Name (printed)<br><br><br></td>
        <td><hr style="margin-bottom: 2px;">Name (printed)<br><br><br></td>
    </tr>
    <tr>
        <td><hr style="margin-bottom: 2px;">Title<br><br><br></td>
        <td><hr style="margin-bottom: 2px;">Title<br><br><br></td>
    </tr>
    <tr>
        <td><hr style="margin-bottom: 2px;">Signature<br><br><br></td>
        <td><hr style="margin-bottom: 2px;">Signature<br><br><br></td>
    </tr>
    <tr>
        <td><hr style="margin-bottom: 2px;">Date<br><br><br></td>
        <td><hr style="margin-bottom: 2px;">Date<br><br><br></td>
    </tr>
</table>
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
    2016 VIATECHNIK ENGINEERING SERVICES BILLING RATE SCHEDULE
</h3>
<div class="text-center">
    <table border="1" cellspacing="0" style="margin: auto; page-break-inside: avoid;">
        <thead>
        <tr>
            <td style="text-decoration: underline; text-align: center;">CLASSIFICATION</td>
            <td style="text-decoration: underline; text-align: center;">UNIT RATE</td>
        </tr>
        </thead>
        <tbody>
        <tr><td> BIM Drafting Engineer	</td><td>$ 55.00/hr</td></tr><tr><td>
                BIM Manager	</td><td>$ 90.00/hr</td></tr><tr><td>
                BIM Consulting	</td><td>$ 100.00/hr</td></tr><tr><td>

                2D Drafting Engineer	</td><td>$ 50.00/hr</td></tr><tr><td>
                Rendering Artist	</td><td>$ 50.00/hr</td></tr><tr><td>
                Steel Detailing Engineer	</td><td>$ 50.00/hr</td></tr><tr><td>

                Quantity Engineer	</td><td>$ 35.00/hr</td></tr><tr><td>

                Administrative/Clerical	</td><td>$ 25.00/hr</td></tr><tr><td>
                Quality Control/ Project Manager	</td><td>$ 90.00/hr</td></tr><tr><td>

                LEED AP Project Coordinator	</td><td>$ 50.00/hr</td></tr><tr><td>

                Project Scheduler	</td><td>$ 70.00/hr</td></tr><tr><td>
                Scheduling Manager/ Scheduling Consultant	</td><td>$ 100.00/hr</td></tr>

        </tbody>
    </table>
    <br><br>
    <table class="t1" style="margin: auto;  page-break-inside: avoid;">
        <thead>
        <tr>
            <th>Reimbursable Expenses </th>
            <th>Rate</th>
        </tr>
        </thead>
        <tbody>
        <tr><td> Subconsultants   </td><td>Cost plus 15%</td></tr><tr><td>
                Prints/Scanning – Color         </td><td>$ 9.00 per sheet</td></tr><tr><td>
                Prints/Scanning – Black and White       </td><td>$ 4.00 per sheet</td></tr><tr><td>
                Computer Disks           </td><td>$ 10.00 per disk</td></tr><tr><td>
                Mail/Shipping           </td><td>Cost plus 15%</td></tr><tr><td>
                Travel Expenses          </td><td> Cost plus 15%</td></tr>
        </tbody>
    </table>
</div>
<pagebreak />

<h3 class="text-center">
    TERMS AND CONDITIONS OF SERVICE
</h3>
<div class="row" style="font-size: 11px;">
    <div style="page-break-inside: avoid;">1. <span style="text-decoration: underline;"> PROPOSAL</span>.  Description of the services to be rendered by VIATechnik (“Services”) is set forth in the price quotation and terms of proposal (“Proposal”) attached to these Terms and Conditions of Service (this “Agreement”).  The Proposal shall remain valid for a period of 30 days from execution and delivery by VIATechnik to the Client.   “Client” refers to the person or the entity identified as the Client on the attached Proposal.</div><br>

    <div style="page-break-inside: avoid;">2. <span style="text-decoration: underline;"> VIATECHNIK CONTACT PERSON</span>.  VIATechnik will designate one of its employees to serve as the contact person for Client in connection with the Services and the Work Product to be provided under this Agreement.  VIATechnik shall cause such designee to be reasonably and promptly available to coordinate with Client so that the objectives of this Agreement can be timely carried out to the satisfaction of the parties.</div><br>

    <div style="page-break-inside: avoid;">3. <span style="text-decoration: underline;"> CONFIDENTIAL INFORMATION</span>. If VIATechnik or Client supplies proprietary or confidential information to the other party in connection with this Agreement that is identified as, or that the other party should have known is, confidential, then the other party agrees to (a) protect the confidential information in a reasonable manner and (b) use and reproduce confidential information only as required to perform its obligations under this Agreement. This Section will not apply to information that is publicly known, already known to the receiving party, disclosed to a third party without restriction, or disclosed pursuant to legal requirement or order.  Subject to the foregoing, VIATechnik may disclose Client’s confidential information to VIATechnik’s employees, contractors and subcontractors in order to perform the Services.</div><br>

    <div style="page-break-inside: avoid;">4. <span style="text-decoration: underline;">  INVOICE AND PAYMENT PROCEDURES</span>. VIATechnik shall submit invoices, once a month, at a minimum, to the Client for Services rendered during each calendar month. The Client, as the Client or authorized agent for the  Client, hereby agrees that payment will be made for said Services within thirty (30) days from the date of invoice; and, in default of such payment, hereby agrees to pay all cost of collection, including reasonable attorney’s fees, regardless of whether legal action is initiated.  The Client hereby acknowledges that unpaid invoices shall accrue interest at 2 percent per month after they have been outstanding for over thirty (30) days.  If an invoice remains unpaid over thirty (30) days, VIATechnik may terminate the provision of its Services until such payment default is cured.  If any payment default fails to be cured for longer than 45 days from the date of the invoice, VIATechnik may at its option terminate this Agreement, whereupon the terms of Section 11 shall govern.</div><br>

    <div style="page-break-inside: avoid;">5. <span style="text-decoration: underline;"> SCOPE OF WORK</span>. The estimation of quantity and total price provided by VIATechnik in the Proposal are good faith estimates based on the plans, drawings and other information provided by the Client as of the date of the Proposal.  There is no guarantee that the Services will be completed within such quantity or price. In the event of any change in the (a) plans and designs, and other Client’s requirements related to the work, (b) any applicable law and regulations effecting the Services and (c) any other reason not contemplated on the date of the Proposal, additional work will be included as Services, and such  additional work shall be paid for by the Client.  VIATechnik agrees to provide to Client a written notice of any work modifications requiring more than [20%] in variation from the fees quoted in the Proposal, and Client will be deemed to have accepted such revised Proposal and estimated fees unless a notice of objection is delivered to VIATechnik within five business days of receipt of such notice from VIATechnik.</div><br>

    <div style="page-break-inside: avoid;">6. <span style="text-decoration: underline;"> WORK PRODUCT</span>. Upon payment of all amounts due to VIATechnik in connection with this Agreement, Client shall own all right, title, and interest in the Work Product.  The foregoing notwithstanding, Work Product shall not include pre-existing materials, software, or applications that are owned by VIATechnik or licensed to VIATechnik by third parties and that VIATechnik uses in the performance of the Services, derivative works deriving from or based on any of the foregoing, or any ideas, concepts, methods, techniques, processes, procedures or know-how embodied by or incorporated into the deliverables that VIATechnik provides to you (collectively, “Tools”).  All right, title, and interest in and to the Tools shall remain VIATechnik’s (or the applicable third party’s) exclusive property.  If Client has any issue or problem with the Work Product or Services provided by VIATechnik or its contractors or employees under this Agreement, Client must provide written notice of such issue or problem within 30 days of the delivery of such Work Product or Services.  Client represents, warrants and covenants that Client solely responsible for reviewing all Work Product and shall be responsible to any third party beneficiaries of the Work Product or other persons or entities that may rely on the Work Product.</div><br>

    <div style="page-break-inside: avoid;">7. <span style="text-decoration: underline;"> MISCELLANEOUS EXPENSES</span>. The Client shall pay the costs of all fees, permits, bond premiums, scanning and reproductions, travel, and all other charges related to the work and the Services, other than those charges which VIATechnik specifically agrees to pay under this Agreement.</div><br>

    <div style="page-break-inside: avoid;">8. <span style="text-decoration: underline;"> REUSE OF PROJECT DELIVERABLES</span>. Reuse of any documents or other deliverables, including electronic media, pertaining to the Services by the Client for any purpose other than that for which such documents or deliverables were originally prepared, or alternation of such documents or  deliverables without written verification or adaption by VIATechnik for the specific purpose intended, shall be at the Client’s sole risk.</div><br>

    <div style="page-break-inside: avoid;">9. <span style="text-decoration: underline;"> RELIANCE ON THE CLIENT DOCUMENTS</span>.  VIATechnik shall rely on the accuracy, completeness and adequacy of all plans, designs, drawings, instructions and other documents and information provided by the Client and any of its contractors, representatives and agents (“Client Documents”).   Client agrees to indemnify, defend, and hold harmless VIATechnik and any of its Clients, directors, officers, employees and agents (“VIATechnik Party”) from and against any loss, liability and damages sustained by them resulting from any of VIATechnik Party’s use or reliance on such Client Documents.</div><br>

    <div style="page-break-inside: avoid;">10. <span style="text-decoration: underline;"> OPINIONS OF CONSTRUCTION COST</span>. Any opinion of construction costs prepared by VIATechnik is supplied for the general guidance of the Client only. Since VIATechnik has no control over competitive bidding or fluctuating market conditions, VIATechnik cannot guarantee the accuracy of such opinions.</div><br>

    <div style="page-break-inside: avoid;">11. <span style="text-decoration: underline;"> INDEMNITY</span>. To the fullest extent permitted by law, each party (“Indemnifying Party”) shall indemnify and save harmless the other party, its Clients, directors, officers, employees and agents (“Indemnified Party”) from and against loss, liability, and damages sustained by the Indemnified Party as a result of Indemnifying Party’s breach of this Agreement or the negligence of the Indemnifying Party, its employees or agents.   The Indemnifying Party’s liability to indemnify hereunder shall be reduced proportionately to the extent that any acts or omissions of the Indemnified Party contributed to such claim, liability or loss.</div><br>

    <div style="page-break-inside: avoid;">12. <span style="text-decoration: underline;"> DISCLAIMERS OF ALL WARRANTIES</span>. VIATechnik hereby disclaims all warranties, whether express or implied, with respect to the services and the word product, including by not limited to, any implied warranty of merchantability, fitness for particular purpose and/or title and, except as set forth in these terms and conditions, the services and the work product are provided “as is”.</div><br>

    <div style="page-break-inside: avoid;">13. <span style="text-decoration: underline;">LIMITATIONS OF LIABILITY</span>.  NEITHER PARTY WILL BE LIABLE (WHETHER IN CONTRACT, WARRANTY, TORT (INCLUDING  NEGLIGENCE),  OR  OTHER  THEORY),  TO  THE OTHER PARTY OR ANY OTHER PERSON OR ENTITY FOR ANY INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, PUNITIVE OR EXEMPLARY DAMAGES (INCLUDING DAMAGES FOR LOSS OF PROFIT) ARISING OUT OF THIS AGREEMENT.   No employee of VIATechnik shall have individual liability to Client.    Client agrees that, to the fullest extent permitted by law, VIATechnik’s total liability to Client for any and all injuries, claims, losses, expenses or damages whatsoever arising out of or in any way related to the Services or this Agreement from any causes including, but not limited to, VIATechnik’s negligence, error, omissions, strict liability, or breach of contract shall not exceed the total compensation received by VIATechnik under this Agreement. If the Client desires a limit of liability greater than provided above, the Client and VIATechnik shall include in the Agreement the amount of such limit and the additional compensation to be paid to VIATechnik for assumption of such risk.</div><br>
    <div style="page-break-inside: avoid;">14. <span style="text-decoration: underline;"> TERMINATION</span>.  This Agreement may be terminated (a) by mutual agreement by the parties (b) by delivery of a termination notice in case either party is in breach and fails to cure such breach within ten days of a written notice thereof (c) automatically without notice in case either party voluntarily or involuntarily files for bankruptcy or liquidation.  Upon termination of this Agreement for any reason, the Client shall pay VIATechnik all fees for the Services carried out up to and including the date of termination together with payment of any costs and expenses incurred VIATechnik to that date.</div><br>
    <div style="page-break-inside: avoid;">15. <span style="text-decoration: underline;"> NON-SOLICITATION</span>. During the term of this Agreement and for a period of 6 months after the Termination Date, Client shall not, directly or indirectly, without VIATechnik’s prior written consent, recruit, hire or contract with any current or former employee or contractor of VIATechnik, or any of VIATechnik’s affiliates, or otherwise attempt to solicit or induce any such individuals to leave the employment of or terminate his/her relationship with VIATechnik or VIATechnik’s affiliates.</div><br>

    <div style="page-break-inside: avoid;">16. <span style="text-decoration: underline;"> AUTHORITY</span>. The persons signing this Agreement warrant that they have the authority to sign as, or on behalf of, the party for whom they are signing.</div><br>

    <div style="page-break-inside: avoid;">17. <span style="text-decoration: underline;"> STATUTE OF LIMITATIONS</span>. To the fullest extent permitted by law, parties agree that, except for claims for indemnification, the time period for bringing claims regarding VIATechnik’s performance under this Agreement shall expire one year after the completion of Services.</div><br>

    <div style="page-break-inside: avoid;">18. <span style="text-decoration: underline;"> ENTIRE AGREEMENT; AMENDMENTS</span>. This Agreement constitutes the entire Agreement between the parties and contains all of the agreements between the parties with respect to the subject matter hereof; this Agreement supersedes any and all other agreements, either oral or in writing, between the parties hereto with respect to the subject matter hereof.  No change or modification of this Agreement shall be valid unless the same is in writing and signed by the parties. No waiver of any provision of this Agreement shall be valid unless in writing and signed by the person or party to be charged.</div><br>

    <div style="page-break-inside: avoid;">19. <span style="text-decoration: underline;"> GOVERNING LAW; VENUE</span>.  The laws of the State of Illinois (without giving effect to its conflict of laws principles) govern all matters arising out of or relating to this Agreement.  The parties agree that any cause of action that may arise in any way under or due to this Agreement shall only be brought in state or federal courts located in the County of Cook, Illinois.</div><br>

    <div style="page-break-inside: avoid;">20. <span style="text-decoration: underline;"> ATTORNEY’S FEES</span>.  Client shall be responsible for all fees and expenses (including, but not limited to, attorneys’ fees and expenses) incurred by VIA in connection with the enforcement of this Agreement, including, but not limited to, the collection of amounts owed to VIA under this Agreement.</div><br>


</div>
