import { Component } from '@angular/core';
import { Patient } from './patient';

@Component({
  moduleId: module.id,
  selector: 'my-app',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'PatientViewer';

  patients = PATIENTS;

  selectedPatient: Patient;

  onSelect(patient: Patient): void {
   this.selectedPatient = patient; 
  }
}


const PATIENTS: Patient[] = [
  { pid: 11, name: 'Mr. Nice' },
  { pid: 12, name: 'Narco' },
  { pid: 13, name: 'Bombasto' },
  { pid: 14, name: 'Celeritas' },
  { pid: 15, name: 'Magneta' },
  { pid: 16, name: 'RubberMan' },
  { pid: 17, name: 'Dynama' },
  { pid: 18, name: 'Dr IQ' },
  { pid: 19, name: 'Magma' },
  { pid: 20, name: 'Tornado' }
];
