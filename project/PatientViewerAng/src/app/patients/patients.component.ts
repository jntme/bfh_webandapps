import { Component, OnInit } from '@angular/core';
import { Patient } from "app/patient";
import { PatientService } from "app/patient.service";
import { Router } from "@angular/router";

@Component({
  selector: 'patients',
  templateUrl: './patients.component.html',
  styleUrls: ['./patients.component.css']
})
export class PatientsComponent implements OnInit {

  patients: Patient[];
  selectedPatient: Patient;

  constructor(
    private patientService: PatientService,
    private router: Router
    ) {};

  ngOnInit(): void {
    this.getPatients();
  }

  getPatients(): void {
    this.patientService.getPatients().then(patients => this.patients = patients);
    // this.patients = this.patientService.getPatients();
  }

  onSelect(patient: Patient): void {
   this.selectedPatient = patient; 
  }

  goToDetail(patientId: number): void {
    this.router.navigate(['/detail', patientId]);
  }

}
