package com.fpvm.app.fpvm;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class MpiangonaActivity extends AppCompatActivity {
    private Button btn_dec;
    private SessionManager sessionManager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mpiangona);

        btn_dec=(Button)findViewById(R.id.btn_dec);
        sessionManager=new SessionManager(this);
        sessionManager.getPseudo();

        btn_dec.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                sessionManager.logout();
                Intent i =new Intent(getApplicationContext(),MainActivity.class);
                startActivity(i);
                finish();
            }
        });
    }
}
