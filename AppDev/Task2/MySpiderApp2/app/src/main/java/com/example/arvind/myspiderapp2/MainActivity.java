package com.example.arvind.myspiderapp2;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.text.TextUtils;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {
    private Spinner spinner;
    private ArrayAdapter<CharSequence> adapter;
    private Button submit;
    private EditText name;
    private EditText rollno;
    private CheckBox profile;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        spinner=(Spinner)findViewById(R.id.spinner);
        submit=(Button)findViewById(R.id.button);
        adapter=ArrayAdapter.createFromResource(this,R.array.dept_names,android.R.layout.simple_spinner_item);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner.setAdapter(adapter);
        spinner.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                String wordselected;
                wordselected = (parent.getItemAtPosition(position)).toString();

            };



            @Override
            public void onNothingSelected(AdapterView<?> parent) {


            }
        });
        submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
               int flag=0;
                name=(EditText)findViewById(R.id.editText);
                rollno=(EditText)findViewById(R.id.editText2);

                if(TextUtils.isEmpty(name.getText())) {
                    Toast.makeText(MainActivity.this, "name is blank", Toast.LENGTH_LONG).show();
                    flag=1;
                }
                    if(TextUtils.isEmpty(rollno.getText())) {

                        Toast.makeText(MainActivity.this, "Rollno is blank", Toast.LENGTH_LONG).show();
                         flag=1;
                    }
                        int uncheck=0;
                profile=(CheckBox)findViewById(R.id.checkBox);
                if(!profile.isChecked())
                    uncheck++;
                profile=(CheckBox)findViewById(R.id.checkBox2);
                if(!profile.isChecked())
                    uncheck++;
                profile=(CheckBox)findViewById(R.id.checkBox3);
                if(!profile.isChecked())
                    uncheck++;
                profile=(CheckBox)findViewById(R.id.checkBox4);
                if(!profile.isChecked())
                    uncheck++;
                if(uncheck==4) {
                    Toast.makeText(MainActivity.this, "no profile is chosen", Toast.LENGTH_LONG).show();
                    flag=1;
                }
                if(flag==0)
                {
                    Intent intent=new Intent(".Main2Activity");
                    Bundle bundle=new Bundle();
                    bundle.putString("name",name.getText().toString());
                    intent.putExtras(bundle);
                    startActivity(intent);
                }
            }

        });

    }


}
