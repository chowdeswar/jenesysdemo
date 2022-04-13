import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { PreloaderComponent } from './components/layouts/preloader/preloader.component';
import { FooterComponent } from './components/layouts/footer/footer.component';
import { HomeOneComponent } from './components/pages/home-one/home-one.component';
import { HomeTwoComponent } from './components/pages/home-two/home-two.component';
import { HomeThreeComponent } from './components/pages/home-three/home-three.component';
import { HomeFourComponent } from './components/pages/home-four/home-four.component';
import { HomeFiveComponent } from './components/pages/home-five/home-five.component';
import { HomeSixComponent } from './components/pages/home-six/home-six.component';
import { HomeSevenComponent } from './components/pages/home-seven/home-seven.component';
import { HomeEightComponent } from './components/pages/home-eight/home-eight.component';
import { NavbarOneComponent } from './components/layouts/navbar-one/navbar-one.component';
import { NavbarTwoComponent } from './components/layouts/navbar-two/navbar-two.component';
import { NavbarThreeComponent } from './components/layouts/navbar-three/navbar-three.component';
import { AboutComponent } from './components/pages/about/about.component';
import { ServicesOneComponent } from './components/pages/services-one/services-one.component';
import { ServicesTwoComponent } from './components/pages/services-two/services-two.component';
import { ServicesDetailsComponent } from './components/pages/services-details/services-details.component';
import { ProjectsOneComponent } from './components/pages/projects-one/projects-one.component';
import { ProjectsTwoComponent } from './components/pages/projects-two/projects-two.component';
import { ProjectsDetailsComponent } from './components/pages/projects-details/projects-details.component';
import { ContactComponent } from './components/pages/contact/contact.component';
import { BlogGridComponent } from './components/pages/blog-grid/blog-grid.component';
import { BlogRightSidebarComponent } from './components/pages/blog-right-sidebar/blog-right-sidebar.component';
import { BlogDetailsComponent } from './components/pages/blog-details/blog-details.component';
import { PricingComponent } from './components/pages/pricing/pricing.component';
import { TeamComponent } from './components/pages/team/team.component';
import { FaqComponent } from './components/pages/faq/faq.component';
import { TermsConditionsComponent } from './components/pages/terms-conditions/terms-conditions.component';
import { PrivacyPolicyComponent } from './components/pages/privacy-policy/privacy-policy.component';
import { ErrorComponent } from './components/pages/error/error.component';
import { LogInComponent } from './components/pages/log-in/log-in.component';
import { SignUpComponent } from './components/pages/sign-up/sign-up.component';
import { ComingSoonComponent } from './components/pages/coming-soon/coming-soon.component';
import { DisclaimerComponent } from './components/pages/disclaimer/disclaimer.component';
import { EnterpriseComponent } from './components/pages/enterprise/enterprise.component';
import { SystemsComponent } from './components/pages/systems/systems.component';
import { IndustryComponent } from './components/pages/industry/industry.component';
import { OurValuesComponent } from './components/pages/about/our-values/our-values.component';
import { AdvantagesComponent } from './components/pages/about/advantages/advantages.component';
import { ExecutiveTeamComponent } from './components/pages/about/executiveteam/executive.component';
import { EngagementsComponent } from './components/pages/about/engagements/engagements.component';
import { CredentialsComponent } from './components/pages/about/credentials/credentials.component';
import { EbusinessComponent } from './components/pages/enterprise/ebusiness/ebusiness.component';
import { WirelessComponent } from './components/pages/enterprise/wireless/wireless.component';
import { SfttestingComponent } from './components/pages/enterprise/sfttesting/sfttesting.component';
import { MainframeComponent } from './components/pages/enterprise/mainframe/mainframe.component';
import { ReengineeringComponent } from './components/pages/enterprise/reengineering/reengineering.component';
import { TechdocComponent } from './components/pages/enterprise/techdoc/techdoc.component';
import { StorageComponent } from './components/pages/systems/storage/storage.component';
import { EmbeddedComponent } from './components/pages/systems/embedded/embedded.component';
import { ValidationComponent } from './components/pages/systems/validation/validation.component';
import { HealthcareComponent } from './components/pages/industry/healthcare/healthcare.component';
import { BankingComponent } from './components/pages/industry/banking/banking.component';
import { GovtComponent } from './components/pages/industry/govt/govt.component';
import { EnergyComponent } from './components/pages/industry/energy/energy.component';
import { RetailComponent } from './components/pages/industry/retail/retail.component';
import { ProductsComponent } from './components/pages/products/products.component';
import { ErpconstructComponent } from './components/pages/products/erpconstruct/erpconstruct.component';
import { FinedealComponent } from './components/pages/products/finedeal/finedeal.component';
import { EnergitComponent } from './components/pages/products/energit/energit.component';
import { PartnerComponent } from './components/pages/partner/partner.component';
import { IbmComponent } from './components/pages/partner/ibm/ibm.component';
import { HpComponent } from './components/pages/partner/hp/hp.component';
import { BorlandComponent } from './components/pages/partner/borland/borland.component';
import { MicrosoftComponent } from './components/pages/partner/microsoft/microsoft.component';
import { OracleComponent } from './components/pages/partner/oracle/oracle.component';
import { InsightsComponent } from './components/pages/insights/insights.component';
import { SuccessComponent } from './components/pages/Insights/success/success.component';
import { NewsComponent } from './components/pages/Insights/news/news.component';
import { CareersComponent } from './components/pages/careers/careers.component';
import { OpeningsComponent } from './components/pages/careers/openings/openings.component';
import { OverviewComponent } from './components/pages/overview/overview.component';

@NgModule({
  declarations: [
    AppComponent,
    PreloaderComponent,
    FooterComponent,
    HomeOneComponent,
    HomeTwoComponent,
    HomeThreeComponent,
    HomeFourComponent,
    HomeFiveComponent,
    HomeSixComponent,
    HomeSevenComponent,
    HomeEightComponent,
    NavbarOneComponent,
    NavbarTwoComponent,
    NavbarThreeComponent,
    AboutComponent,
    ServicesOneComponent,
    ServicesTwoComponent,
    ServicesDetailsComponent,
    ProjectsOneComponent,
    ProjectsTwoComponent,
    ProjectsDetailsComponent,
    ContactComponent,
    BlogGridComponent,
    BlogRightSidebarComponent,
    BlogDetailsComponent,
    PricingComponent,
    TeamComponent,
    FaqComponent,
    TermsConditionsComponent,
    PrivacyPolicyComponent,
    ErrorComponent,
    LogInComponent,
    SignUpComponent,
    ComingSoonComponent,
    DisclaimerComponent,
    EnterpriseComponent,
    SystemsComponent,
    IndustryComponent,
    OurValuesComponent,
    AdvantagesComponent,
    ExecutiveTeamComponent,
    EngagementsComponent,
    CredentialsComponent, EbusinessComponent, WirelessComponent, SfttestingComponent, MainframeComponent, ReengineeringComponent, TechdocComponent, StorageComponent, EmbeddedComponent, ValidationComponent, HealthcareComponent, BankingComponent, GovtComponent, EnergyComponent, RetailComponent, ProductsComponent, ErpconstructComponent, FinedealComponent, EnergitComponent, PartnerComponent, IbmComponent, HpComponent, BorlandComponent, MicrosoftComponent, OracleComponent, InsightsComponent, SuccessComponent, NewsComponent, CareersComponent, OpeningsComponent, OverviewComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
