package com.example.arvind.myspiderapp2;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import java.text.SimpleDateFormat;
import java.util.Date;

/**
 * Created by arvind on 6/7/2016.
 */
public class Main2Activity extends AppCompatActivity{
   private TextView response;
   private Button back;
   private TextView timestamp;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main_activity2);
        Bundle bundle=getIntent().getExtras();
        String name=bundle.getString("name");
        response=(TextView)findViewById(R.id.textView2);
        response.setText("Thankyou "+name+" for your response");
        back=(Button)findViewById(R.id.button2);
        SimpleDateFormat SimpleDateFormat= new SimpleDateFormat("dd-MM-yyyy-hh-mm-ss");
        String format = SimpleDateFormat.format(new Date());
        timestamp =(TextView)findViewById(R.id.textView3);
        timestamp.setText("TimeStamp:"+format);
        back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
    }

}
