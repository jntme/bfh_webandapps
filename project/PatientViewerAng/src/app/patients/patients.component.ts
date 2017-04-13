import { Component, OnInit, Output } from '@angular/core';
import { Patient } from "app/patient";
import { PatientService } from "app/patient.service";

@Component({
  selector: 'patients',
  templateUrl: './patients.component.html',
  styleUrls: ['./patients.component.css']
})
export class PatientsComponent implements OnInit {

  patients: Patient[];
  @Output() selectedPatient: Patient;

  constructor(private patientService: PatientService) {};

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

}
