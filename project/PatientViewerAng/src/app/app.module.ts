import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { RouterModule } from '@angular/router';

import { AppComponent } from './app.component';
import { PatientDetailComponent } from './patient-detail/patient-detail.component';
import { PatientsComponent } from './patients/patients.component';
import { DashboardComponent } from './dashboard/dashboard.component';
import { AppRoutingModule } from "app/app-routing/app-routing.module";

// Imports for loading & configuring the in-memory web api
import { InMemoryWebApiModule } from './in-memory-web-api';
import { InMemoryDataService }  from './in-memory-data.service';
import { PatientSearchComponent } from './patient-search/patient-search.component';

@NgModule({
  declarations: [
    AppComponent,
    PatientDetailComponent,
    PatientsComponent,
    DashboardComponent,
    PatientSearchComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule,
    NgbModule.forRoot(),
    AppRoutingModule,
    InMemoryWebApiModule.forRoot(InMemoryDataService)

  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

