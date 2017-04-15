import { Component, OnInit } from '@angular/core';
import { Patient } from "app/patient";
import { PatientService } from "app/patient.service";

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {

  patients: Patient[] = [];
  constructor(private patientService: PatientService) { }

  ngOnInit() : void {
    this.patientService.getPatients().then(
      patients => this.patients = patients.slice(0,8)
    );
  }

}
